@extends('admin.layouts.app', ['title' => 'Contacts'])

@section('content')

<div class="py-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
			<li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Halaman Kontak</li>
		</ol>
	</nav>

</div>

<div class="container">

	<div class="row justify-content-center mb-3">
		<div class="d-flex justify-content-between w-100 flex-wrap">
			<div class="mb-3 mb-lg-0 pl-1">
				<h1 class="h4">Data Kontak</h1>
				<p class="mb-0">Semua data untuk kotak masuk.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="contact-table">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Email</th>
										<th>Dikirim Pada</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('addon-script')
<script>
	var notyf = new Notyf();

	$('#contact-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.contact.index') }}",
		columns: [
			{data: 'full_name', name: 'full_name'},
			{data: 'email', name: 'email'},
			{data: 'created_at', name: 'created_at'},
			{data: 'action', name: 'action'}
		]
	});

	$('#contact-table').on('click', '.btn-delete', function(e){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});

		const url = $(this).data('url');

		$.ajax({
			url: url,
			type: 'DELETE',
			data: {_method: 'DELETE', submit: true},
			dataType: 'json',
		}).always(function(data){
			notyf.success(data.msg);
			$('#contact-table').DataTable().draw(false);
		});
	});
</script>

@endpush
