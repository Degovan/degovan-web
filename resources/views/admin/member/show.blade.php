@extends('admin.layouts.app',['title' => 'Detail Member'])

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Member</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-4">Detail Member {{ $member->name }}</h2>
            <form action="{{ route('member.update', [$member->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                id="name" name="name" value="{{ $member->name }}">
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="part">Part</label>
                            <input type="text" class="form-control {{ $errors->first('part') ? 'is-invalid' : '' }}"
                                id="part" name="part" value="{{ $member->part }}">
                            <div class=" invalid-feedback">
                                {{$errors->first('part')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">

                    <div class="col-md-6 mb-3">
                        <label for="textarea">Description</label>
                        <textarea class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}"
                            placeholder="Deksripsi..." id="description" name="description"
                            rows="4">{{ old('description') }}{{old('description', $member->description)}}</textarea>
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file {{ $errors->first('image') ? 'is-invalid' : '' }}"
                            name="image" id="image">
                        <div class="invalid-feedback">
                            {{$errors->first('image')}}
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-light text-center p-0">
                    <div class="profile-cover rounded-top"
                        style="background-image: url('https://cdn.consumerscu.org/wp-content/uploads/2019/08/checking_account_1566231082.jpeg')">
                    </div>
                    <div class="card-body pb-5">
                        <img src="{{ Storage::url('public/'. $member->image) }}"
                            class="user-avatar large-avatar rounded-circle mx-auto mt-n7 mb-4"
                            alt="{{ $member->name }}">

                        <h5 class="font-weight-normal">{{ $member->name }}</h5>
                        <p class="text-gray mb-4">{{ $member->part }}</p>
                        <a class="btn btn-sm btn-primary mr-2" href="#"><span class="fas fa-user-plus mr-1"></span>
                            Connect</a>
                        <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
