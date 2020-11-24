@extends('admin.layouts.app', ['title' => 'Post Category'])

@section('content')
    
<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Member</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Member</li>
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

    <div class="col-12 mb-3">
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.post.category.create') }}" class="btn btn-primary">Tambah Kategori Artikel</a>
            </div>
        </div>
    </div>
    <div class="col-12 mb-2">
        <div class="card border-light shadow-sm components-section">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')

<script>
    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%'
            },
        ]
    });

</script>

@endpush