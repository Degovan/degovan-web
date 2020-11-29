<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(CategoriesDataTable $dataTable)
    // {
    //     return $dataTable->render('admin.categories.index');
    // }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function json()
    {   
        $categories = Category::get();
        return Datatables::of($categories)
                            ->editColumn('created_at', function($category){
                                return $category->created_at->diffForHumans();
                            })
                            ->addColumn('action', function ($category){
                                return view('admin.categories.partials.action-button', [
                                    'category' => $category
                                ]);
                            })
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.categories.create',[
            'category' => new Category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $attr = request()->all();
        // dd($attr);

        $attr['slug'] = Str::slug(request('name'));
        Category::create($attr);

        return redirect()
                ->route('admin.categories.index')
                ->with('status','Kategori portofolio '. $request->name . ' telah ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $attr = request()->all();
        $category->update($attr);

        return redirect()
                ->route('admin.categories.index')
                ->with('status','Kategori portofolio '. $request->name . ' telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $categoryId = Category::find($id);
        $categoryId->delete();
      
        return redirect()
                ->route('admin.categories.index')
                ->with('status','Kategori portofolio '. $categoryId->name . ' telah dihapus');
    }
}
