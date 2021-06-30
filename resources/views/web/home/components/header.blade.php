  <!-- Header-->
  <header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2">Konsultasi ide anda Bersama developer kami</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Kami bersedia untuk mewujudkan ide yang anda punya dengan developer spesialis dari tim kami. Anda ragu bersama kami? Silahkan cek portofolio yang telah kami garap dibawah ini.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('web.portofolio') }}">Portofolio</a>
                        {{-- <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src=" {{ asset('web-assets/img/bg-1.jpg') }} " alt="..." /></div>
        </div>
    </div>
</header>