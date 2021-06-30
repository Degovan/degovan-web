@extends('web.layouts.app')


@section('content')
{{-- @include('web.portofolio.includes.header') --}}
    
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bolder">Pekerjaan kita</h1>
            <p class="lead fw-normal text-muted mb-0">Portofolio perusahaan kami</p>
        </div>
        <div class="row gx-5">
            <div class="col-lg-6">
                <div class="position-relative mb-5">
                    <img class="img-fluid rounded-3 mb-3" src="{{ asset('web-assets/img/sd.jpeg')}}" alt="..." />
                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Website blog Sorot Daerah</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative mb-5">
                    <img class="img-fluid rounded-3 mb-3" src="{{ asset('web-assets/img/kbcons.jpg')}}" alt="..." />
                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Website Kb consultant</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative mb-5 mb-lg-0">
                    <img class="img-fluid rounded-3 mb-3" src="{{ asset('web-assets/img/websekolah.jpeg')}}" alt="..." />
                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Website Sekolah SMK Darul Muqomah</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img class="img-fluid rounded-3 mb-3" src="{{ asset('web-assets/img/sd.jpeg')}}" alt="..." />
                    <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="#!">Project name</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <h2 class="display-4 fw-bolder mb-4">Mari membangun sesuatu bersama</h2>
        <a class="btn btn-lg btn-primary" href="#!">Kontak</a>
    </div>
</section>
@endsection