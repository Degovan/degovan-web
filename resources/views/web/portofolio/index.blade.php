@extends('web.layouts.app')


@section('content')
@include('web.portofolio.includes.header')
    
<section id="content">
    <h1 align="center">Portofolio</h1>

    <div class="container">
        <div class="row">
            @foreach ($portofolios as $portofolio)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $portofolio->images_url }}" alt="{{ $portofolio->images_url }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection