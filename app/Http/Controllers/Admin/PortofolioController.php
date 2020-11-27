<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Service, Portofolio};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.portofolios.index');
    }

    public function json(Request $request)
    {

        if($request->ajax()) {
        $portofolios = Portofolio::query();

        return Datatables::of($portofolios)
                            ->addColumn('category', function($portofolio){
                                return '
                                    <a href="'.route('admin.categories.show', $portofolio->category->id).'">'.$portofolio->category->name.'</a>
                                ';
                            })
                            ->addColumn('service', function($portofolio){
                                return '
                                    <a href="/admin/service/'.$portofolio->service->id.'">'.$portofolio->service->name.'</a>
                                ';
                            })
                            ->editColumn('created_at', function($portofolio){
                                return $portofolio->created_at->diffForHumans();
                            })
                            ->addColumn('action', function($portofolio){
                                return view('admin.portofolios.partials.action-button',[
                                    'portofolio' => $portofolio
                                ]);
                            })
                            ->rawColumns(['category', 'service'])
                            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portofolios.create',[
            'categories' => Category::get(),
            'services'   => Service::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = request()->all();
        
        $attr['slug'] = Str::slug(request('title'));

        Portofolio::create($attr);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        //
    }
}
