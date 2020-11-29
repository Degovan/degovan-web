<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\Tag;
use App\Models\PostTag;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
}
