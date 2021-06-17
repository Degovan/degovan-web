<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture'       => 'required|mimes:jpg,jpeg,png',
            'name'          => 'required|string',
            'role'          => 'required|string',
            'testimonial'   => 'required|string'
        ]);

        $data = $request->all();
        $data['picture'] = $request->file('picture')->store('assets/testimonials', 'public');

        Testimonial::create($data);
        return redirect()->route('testimonial.index')->with('status', 'Data Testimonial Berhasil Ditambahkan');
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
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        if( !$testimonial ) {
            return abort(404);
        }

        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture'       => 'mimes:jpg,jpeg,png',
            'name'          => 'required|string',
            'role'          => 'required|string',
            'testimonial'   => 'required|string'
        ]);

        $testimonial = Testimonial::find($id);
        if( !$testimonial ) return abort(404);

        $data = $request->all();
        $data['picture'] = $testimonial->picture;
        if( $request->file('picture') ) {
            $data['picture'] = $request->file('picture')->store('assets/testimonial', 'public');
            Storage::delete('public/' . $testimonial->picture);
        }
        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('status', 'Data Testimonial Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::delete('public/' . $testimonial->picture);
        $testimonial->delete();
        return redirect()->route('testimonial.index')
            ->with(['status' => 'Data Testimonial Berhasil Dihapus']);
    }
}
