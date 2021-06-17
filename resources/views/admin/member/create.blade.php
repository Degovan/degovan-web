@extends('admin.layouts.app',['title' => 'Create Member'])

@section('content')


<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Member</li>
        </ol>
    </nav>

</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <form action="{{ url('admin/member') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                    id="name" name="name" value="{{ old('name') }}">
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="part">Part</label>
                                <input type="text" class="form-control {{ $errors->first('part') ? 'is-invalid' : '' }}"
                                    id="part" name="part" value="{{ old('part') }}">
                                <div class=" invalid-feedback">
                                    {{$errors->first('part')}}
                                </div>
                            </div>

                            <div class="my-4">
                                <label for="textarea">Description</label>
                                <textarea class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                                    placeholder="Deksripsi..." id="description" name="description"
                                    rows="4">{{ old('description') }}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('description')}}
                                </div>
                            </div>

                            <div class="my-4">
                                <label for="image">Image</label>
                                <input type="file"
                                    class="form-control-file {{ $errors->first('image') ? 'is-invalid' : '' }}"
                                    name="image" id="image">
                                <div class="invalid-feedback">
                                    {{$errors->first('image')}}
                                </div>
                            </div>

                            <div class="mb-3">
                                {{-- <input type="submit" value="Simpan"> --}}
                                <button type="submit" class="btn btn-secondary text-dark">Simpan</button>
                            </div>
                        </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection
