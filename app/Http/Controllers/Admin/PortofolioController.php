<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortofolioRequest;
use App\Models\{Category, Portofolio};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;
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
        // dd($portofolios);

        return Datatables::of($portofolios)
                            ->addColumn('category', function($portofolio){
                                return '
                                    <a href="'.route('admin.categories.show', $portofolio->category->id).'">'.$portofolio->category->name.'</a>
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
            'portofolios' => new Portofolio,
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortofolioRequest $request)
    {
        $attr = request()->all();
        
        $attr['slug'] = Str::slug(request('title'));
        $attr['images_url'] = $request->image->store('assets/portofolio', 'public');

        Portofolio::create($attr);

        return redirect()
                ->route('portofolios.index')
                ->with('status','Portofolio '. $request->title . ' telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolios.edit',
        [
            'portofolios' => $portofolio,
            'categories'  => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(PortofolioRequest $request, Portofolio $portofolio)
    {
        $attr = request()->all();

        if ($request->hasFile('image')) {
            if ($portofolio->images_url && file_exists(storage_path('app/public/' . $portofolio->images_url))) {
                Storage::delete('public/' . $portofolio->images_url);
                $attr['images_url'] =  $request->file('image')->store('assets/portfolio', 'public');
            } else {
                $attr['images_url'] =  $request->file('image')->store('assets/portfolio', 'public');
            }
        }

        $portofolio->update($attr);

        return redirect()
                ->route('portofolios.index')
                ->with('status','Portofolio '. $request->title . ' telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $portofolioId = Portofolio::find($id);
        unlink(storage_path('app/public/'.$portofolioId->images_url));
        $portofolioId->delete();
        return redirect()
                ->route('portofolios.index')
                ->with('status','Portofolio '. $request->title . 'telah dihapus');
    }
}
