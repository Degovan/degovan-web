<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use App\Models\PostTag;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Post::query())
                ->editColumn('image', function ($post) {
                    return view('admin.post.partials.img', ['post' => $post]);
                })
                ->editColumn('category_post_id', function ($post) {
                    return $post->category_post->name;
                })
                ->addColumn('diposting_oleh', function ($post) {
                    return $post->user->name;
                })
                ->addColumn('action', function($post) {
                    return view('admin.post.partials.action-button', ['post' => $post]);
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'post_categories'   => CategoryPost::orderBy('name', 'ASC')->get(),
            'tags'              => Tag::orderBy('name', 'ASC')->get(),
        ];

        return view ('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $validator = $this->imageValidation($request);
        if($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $slug = Str::slug($request->title);
        $namaGambar = $this->getNewFileNameWithSlug($slug, $request->file('image'));
        Storage::putFileAs('public/assets/posts', $request->file('image'), $namaGambar);
            
        $post = Post::create([
            'user_id'           => Auth::user()->id,
            'category_post_id'  => $request->category_post_id,
            'title'             => $request->title,
            'slug'              => $slug,
            'body'              => $request->body,
            'image'             => $namaGambar,
        ]);

        foreach ($request->tags as $tag) {
            PostTag::create([
                'post_id'   => $post->id,
                'tag_id'    => $tag,
            ]);
        }

        return redirect()->route('admin.post.index')->with('status', 'Artikel ' . $request->title . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post_categories'   => CategoryPost::orderBy('name', 'ASC')->get(),
            'tags'              => Tag::orderBy('name', 'ASC')->get(),
            'post'              => $post,
            'post_tags'         => PostTag::where('post_id', $post->id)->get(),
        ];

        return view ('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $namaGambar = $post->image;
        if(!is_null($request->file('image'))) {

            $validator = $this->imageValidation($request);
            if($validator->fails()) {
                return back()
                        ->withErrors($validator)
                        ->withInput();
            }

            Storage::delete('public/assets/posts'. $namaGambar);

            $slug = $post->slug;
            $namaGambar = $this->getNewFileNameWithSlug($slug, $request->file('image'));
            Storage::putFileAs('public/assets/posts', $request->file('image'), $namaGambar);
        }
        
        $post->update([
            'category_post_id'  => $request->category_post_id,
            'title'             => $request->title,
            'body'              => $request->body,
            'image'             => $namaGambar,
        ]);

        PostTag::where('post_id', $post->id)->delete();

        foreach ($request->tags as $tag) {
            PostTag::create([
                'post_id'   => $post->id,
                'tag_id'    => $tag,
            ]);
        }

        return redirect()->route('admin.post.index')->with('status', 'Artikel ' . $request->title . ' telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(Storage::exists('public/assets/posts/' . $post->image)) {
            Storage::delete('public/assets/posts/' . $post->image);
        }
        $post = Post::find($post->id);
        Post::destroy($post->id);
        return back()->with('status', 'Artikel ' . $post->title . ' telah dihapus');
    }

    public function imageValidation($request)
    {
        $validator = Validator::make($request->all(), [
            'image'     => 'required|mimes:jpeg,jpg,png',
        ], [
            'image.required'    => 'Gambar tidak boleh kosong',
            'image.mimes'       => 'Gambar tidak valid harus memiliki ekstensi jpg, jpeg, png',
        ]);

        return $validator;
    }
}
