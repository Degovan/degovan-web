@extends('admin.layouts.app', ['title' => 'Tambah Kategori'])

@section('content')
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Halaman Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Halaman Tambah Kategori</li>
        </ol>
    </nav>

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah Kategori</h1>
                <p class="mb-0">Form untuk menambahkan kategori portofolio.</p>
            </div>
        </div>
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST" autocomplete="off">
                    @csrf
                    @include('admin.categories.partials.form-control', ['button' => 'simpan'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection