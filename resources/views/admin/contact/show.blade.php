@extends('admin.layouts.app', ['title' => 'Kontak'])

@section('content')

<div class="py-4">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
			<li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="#">Halaman Kontak</a></li>
			<li class="breadcrumb-item active" aria-current="page">Detail</li>
		</ol>
	</nav>

</div>

<div class="container">

	<div class="row justify-content-center mb-3">
		<div class="d-flex justify-content-between w-100 flex-wrap">
		<div class="mb-3 mb-lg-0 pl-1">
			<h1 class="h4">Detail Kontak</h1>
			<p class="mb-0">Detail untuk kotak masuk.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-8">
							<h6>
								<strong>{{ $contact->full_name }}</strong>
								<span class="text-muted">&lt;{{ $contact->email }}&gt;</span>
							</h6>
						</div>
						<div class="col-md-4 text-right">
							<small>{{ $contact->created_at->format('d M Y') }}</small>
						</div>
					</div>
				</div>
				<div class="card-body">
					<p>{{ $contact->description }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
