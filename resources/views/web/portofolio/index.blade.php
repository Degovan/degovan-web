@extends('web.layouts.app')


@section('content')
@include('web.portofolio.includes.header')
    
<section id="content">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3">
                <select name="" id="" class="form-control">
                    <option value="">All</option>
                    <option value="">Website</option>
                    <option value="">Mobile</option>
                    <option value="">Ui/Ux</option>
                </select>
            </div>
        </div>
    </div>
    {{-- <h1 align="center">Portofolio</h1> --}}

    <div class="container">
        <div class="row">
            @foreach ($portofolios as $portofolio)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ url($portofolio->takeImage) }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection