@extends('admin.layouts.app', ['title' => 'Portofolio'])

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Halaman Portofolio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Halaman Edit Portofolio</li>
        </ol>
    </nav>

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit Portofolio</h1>
                <p class="mb-0">Form untuk menambahkan kategori portofolio.</p>
            </div>
        </div>
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ route('portofolios.update', $portofolios->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('patch')
                    @include('admin.portofolios.partials.form-control')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
<style>
    .image-preview {
        width: 16rem;
        height: 11rem;
        border: 2px dashed #ddd;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
        border-color: #969696;
        margin: auto;
        background-size: cover;
        background-position: 50%;
    }
</style>
@endsection
