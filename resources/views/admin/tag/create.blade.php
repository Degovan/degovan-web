@extends('admin.layouts.app',['title' => 'Create Member'])

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post.tag.index') }}">Tag Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Tag Artikel</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ route('admin.post.tag.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-">
                            <div class="mb-3">
                                <label for="name">Nama Tag Artikel <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Tag Artikel" autocomplete="off" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-secondary text-dark">Simpan</button>
                                    <button type="reset" class="btn btn-light ml-2">Reset</button>
                                </div>
                                <div>
                                    <a href="{{ route('admin.post.tag.index') }}" class="btn btn-dark">Kembali</a>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
