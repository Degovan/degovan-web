<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(Tag::query())
                ->addColumn('action', function($tag) {
                    return view('admin.tag.partials.action-button', ['tag' => $tag]);
                })->make(true);
        }

        return view('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.post.tag.index')->with('status', 'Tag Artikel ' . $request->name . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view ('admin.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name'  => $request->name,
        ]);

        return redirect()->route('admin.post.tag.index')->with('status', 'Tag Artikel ' . $request->name . ' telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        Tag::destroy($tag->id);
        return redirect()->route('admin.post.tag.index')
            ->with(['status' => 'Tag Artikel ' . $tag->name . ' telah Dihapus']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxPost(Request $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return response([
            'success' => true,
            'message' => 'tag success inserted',
            'data' => [$request->name]
        ], 200);
    }

    public function ajaxGetAll()
    {
        $tags = Tag::select('id', 'name')->orderBy('name', 'ASC')->get();

        return response([
            'success' => true,
            'message' => 'get all tags',
            'data' => $tags,
        ], 200);
    }
}
