@extends('admin.layouts.app',['title' => 'Edit Testimonial'])

@section('content')


<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Testimonial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
        </ol>
    </nav>

</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    id="name" name="name" value="{{ old('name') ? old('name') : $testimonial->name }} ?" autocomplete="off">
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="role">Role</label>
                                <input type="text" class="form-control {{ $errors->first('role') ? 'is-invalid' : '' }}"
                                    id="role" name="role" value="{{ old('role') ? old('role') : $testimonial->role }}" autocomplete="off">
                                <div class=" invalid-feedback">
                                    {{$errors->first('role')}}
                                </div>
                            </div>

                            <div class="my-4">
                                <label for="textarea">Testimoni</label>
                                <textarea class="form-control {{ $errors->first('testimonial') ? 'is-invalid' : '' }}"
                                    placeholder="Testimonial..." id="testimonial" name="testimonial"
                                    rows="4">{{ old('testimonial') ? old('testimonial') : $testimonial->testimonial }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('testimonial')}}
                                </div>
                            </div>

                            <div class="my-4">
                                <label for="picture">Picture</label>
                                <input type="file"
                                    class="form-control-file {{ $errors->first('picture') ? 'is-invalid' : '' }}"
                                    name="picture" id="picture">
                                <div class="invalid-feedback">
                                    {{$errors->first('picture')}}
                                </div>
                            </div>

                            <div class="mb-3">
                                {{-- <input type="submit" value="Simpan"> --}}
                                <button type="submit" class="btn btn-secondary text-dark">Update</button>
                            </div>
                        </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection
