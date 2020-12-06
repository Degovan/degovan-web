@extends('admin.layouts.app',['title' => 'Create Member'])

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}"> Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="col-12 col-lg-7 mb-4">
        <div class="card border-light shadow-sm">
            <div class="card-header border-bottom border-light d-flex justify-content-between">
                <h2 class="h5 mb-0">Tambah Artikel</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <div class="mb-3">
                                <label for="title">Judul Artikel <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Artikel" autocomplete="off" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body">Isi <span class="text-danger">*</span></label>
                                <textarea name="body" id="body">{{old('body')}}</textarea>
                                    @error('body')
                                        <div class="text-danger h6 mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <label for="image">Gambar</label>
                            <div class="form-file mb-3">
                                <input type="file" class="form-file-input" name="image" id="image"> 
                                <label class="form-file-label" for="image">
                                    <span class="form-file-text">Choose file...</span> 
                                    <span class="form-file-button">Browse</span>
                                </label>
                                @error('image')
                                    <div class="text-danger h6 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title">Kategori <span class="text-danger">*</span></label>
                                <select name="category_post_id" class="form-control" id="category_post_id">
                                    @foreach ($post_categories as $post_category)
                                        <option value="{{ $post_category->id }}" {{ old('category_post_id') == $post_category->id ? 'selected' : '' }}>{{ $post_category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_post_id')
                                    <div class="text-danger h6 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tag">Tag</label>
                                <select name="tags[]" multiple="multiple" class="w-100 js-example-basic-multiple" id="tags">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" 
                                            @if (old('tags'))
                                                @foreach (old('tags') as $old_tag)
                                                    {{ $tag->id == $old_tag ? 'selected' : '' }}
                                                @endforeach   
                                            @endif
                                         >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                @error('tag')
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
                                    <a href="{{ route('admin.post.index') }}" class="btn btn-dark">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5 mb-4">
        <div class="card border-light shadow-sm">
            <div class="card-header border-bottom border-light d-flex justify-content-between">
                <h2 class="h5 mb-0">Tambah Tag</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.post.tag.store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-">
                            <div class="message-status">
                                
                            </div>
                            <div class="mb-3">
                                <label for="name">Nama Tag <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Tag" autocomplete="off" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-secondary text-dark save-tag">Simpan</button>
                                    <button type="reset" class="btn btn-light ml-2">Reset</button>
                                </div>
                                <div>
                                    <a href="{{ route('admin.post.tag.index') }}" class="btn btn-dark">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('prepend-script')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush

@push('addon-script')
    <script>
        CKEDITOR.replace('body');
    </script>
    <script>
        $(document).ready(function() {
            $('#tags').select2();
        });
    </script>
    <script>

        $(".save-tag").click(function(event){
            event.preventDefault();
      
            let name = $("input[name=name]").val();
      
            $.ajax({
              url: "/admin/post/tag/ajax/post",
              type:"POST",
              data:{
                name:name,
                _token: '{{csrf_token()}}'
              },
              success:function(response){
                if(response) {
                    $('.message-status').text('');
                    $('.message-status').append(`<div class="alert alert-success">
                                    <h6 class="text-white">Tag ${response.data[0]} telah ditambahkan</h6>
                                </div>`);
                    
                    $.ajax({
                        type: 'GET',
                        url: '/admin/post/tag/ajax/getAll',
                        dataType: 'json',
                        success: function (data) {
                            const tags = data.data;
                            $('#tags').text('');
                            $.each(tags, function(index, tag) {
                                $('#tags').append(`<option value="${tag.id}">${tag.name}</option>`); 
                            })
                        }
                    });
                }
              },
              error: function(response) {
                $('.message-status').text('');
                    $('.message-status').append(`<div class="alert alert-danger">
                                    <h6 class="text-white">${response.responseJSON.errors.name[0]} telah ditambahkan</h6>
                                </div>`);
              }
             });
        });
      </script>
@endpush

