<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CategoryPostRequest;
use Illuminate\Support\Str;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return DataTables::of(CategoryPost::query())
            ->addColumn('action', function ($category) {
                return view('admin.category-post.partials.action-button', ['category' => $category]);
            })->make(true);
        } else {
            return view('admin.category-post.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.category-post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryPostRequest $request)
    {
        CategoryPost::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.post.category.index')->with('status', 'Kategori Artikel ' . $request->name . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryPost $categoryPost)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('admin.category-post.edit', ['category' => CategoryPost::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryPostRequest $request, $id)
    {
        $categoryPost = CategoryPost::find($id);
        $categoryPost->update([
            'name'  => $request->name,
        ]);

        return redirect()->route('admin.post.category.index')->with('status', 'Kategori Artikel ' . $request->name . ' telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryPost = CategoryPost::find($id);
        CategoryPost::destroy($categoryPost->id);
        return redirect()->route('admin.post.category.index')
            ->with(['status' => 'Kategori Artikel ' . $categoryPost->name . ' telah Dihapus']);
    }
}
