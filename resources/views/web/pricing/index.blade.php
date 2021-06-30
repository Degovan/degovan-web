@extends('web.layouts.app')

@section('content')
      <!-- Pricing section-->
      <section class="bg-light py-5">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="fw-bolder">Daftar Harga Paket</h1>
                <p class="lead fw-normal text-muted mb-0">Paket yang kami tawarkan kepada anda dan benefit apa saja yang anda dapatkan</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <!-- Pricing card free-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">Cadet</div>
                            <div class="mb-3">
                                <span class="text-muted">Mulai harga</span> <br>
                                <span class="fw-bold">Rp 100.000 - Rp549.000.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    {{-- <i class="bi bi-check text-primary"></i>
                                    <strong>1 users</strong> --}}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Free</strong> konsultasi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Source code
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>5x</strong> Revisi
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Video Demo Aplikasi
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Hosting + Domain
                                </li>
                            </ul>
                            {{-- <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div> --}}
                        </div>
                    </div>
                </div>
                <!-- Pricing card pro-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-5 mb-xl-0">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold text-muted">
                                Diamon
                            </div>
                            <div class="mb-3">
                                <span class="text-muted">Mulai harga</span> <br>
                                <span class="fw-bold">Rp 550.000 - Rp5.499.000.</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    {{-- <i class="bi bi-check text-primary"></i>
                                    <strong>1 users</strong> --}}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Free</strong> konsultasi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Source code
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>10x</strong> Revisi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Video Demo Aplikasi
                                </li>
                                <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Hosting + Domain
                                </li>
                                {{-- <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Video Demo Aplikasi
                                </li> --}}
                            </ul>
                            {{-- <div class="d-grid"><a class="btn btn-primary" href="#!">Choose plan</a></div> --}}
                        </div>
                    </div>
                </div>
                <!-- Pricing card enterprise-->
                <div class="col-lg-6 col-xl-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="small text-uppercase fw-bold">
                                <i class="bi bi-star-fill text-warning"></i>
                                Major
                            </div>
                            <div class="mb-3">
                                <span class="text-muted">Mulai harga</span> <br>
                                <span class="fw-bold">Rp 5.500.000 - Rp50.000.000.+</span>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2">
                                    {{-- <i class="bi bi-check text-primary"></i>
                                    <strong>1 users</strong> --}}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Free</strong> konsultasi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Source code
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    <strong>Unlimited</strong> Revisi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Video Demo Aplikasi
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Hosting + Domain
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-primary"></i>
                                    Dokumentasi
                                </li>
                                {{-- <li class="mb-2 text-muted">
                                    <i class="bi bi-x"></i>
                                    Video Demo Aplikasi
                                </li> --}}
                            </ul>
                            {{-- <div class="d-grid"><a class="btn btn-outline-primary" href="#!">Choose plan</a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

