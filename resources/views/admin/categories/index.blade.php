@extends('admin.layouts.app', ['title' => 'Kategori'])

@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Halaman Kategori</li>
        </ol>
    </nav>

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Kategori</h1>
                <p class="mb-0">Semua data untuk kategori portofolio.</p>
            </div>
            <div>
                <a href="{{ route('categories.create') }}" class="btn btn-outline-gray"><i class="fas fa-plus mr-1"></i> Tambah Kategori</a>
            </div>
        </div>

        <table class="table table-bordered shadow-sm" id="categories-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

<script>
    $(function(){
        $('#categories-table').DataTable({
            processing : true,
            serverSide : true,
            ajax : '{!! route('admin.categories.json') !!}',

            columns : [
                {data : 'id' , name : 'id'},
                {data : 'name' , name : 'name'},
                {data : 'created_at', name : 'created_at'},
                {data : 'updated_at' , name : 'updated_at'},
                {data : 'action', name : 'action', orderable : false, searchable : false}
            ]
        })
    })
</script>
@endpush
