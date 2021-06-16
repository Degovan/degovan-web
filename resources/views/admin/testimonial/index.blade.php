@extends('admin.layouts.app',['title' => 'Testimonial'])

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Testimonial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Testimonial</li>
        </ol>
    </nav>

</div>

<div class="row">

    @if (session('status'))
    @push('addon-script')
    <script>
        swal({
            title: "Good job!",
            text: "{{ session('status') }}",
            icon: "success",
            button: false,
            timer: 3000
        });

    </script>
    @endpush
    @endif


    <div class="col-12 mb-2">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="row">

                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $key => $testimonial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ '/storage/' . $testimonial->picture }}" alt="" width="100px" class="rounded"></td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->role }}</td>
                                    <td>
                                        <div class="btn-group">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                                        type="button" id="testimonial-{{ $testimonial->id }}"
                                                            data-toggle="dropdown" 
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Aksi
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="testimonial-{{ $testimonial->id }}">
                                                        <a class="dropdown-item" href="{{ route('testimonial.edit', $testimonial->id) }}">
                                                            Sunting
                                                        </a>
                                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

