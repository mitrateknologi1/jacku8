@extends('landing.layouts.main')

@section('title')
    Profil Kami
@endsection

@push('style')
@endpush

@section('content')
    <section class="pt-5 pt-md-5" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Profil Kami</span>
                    </h2>

                </div>
            </div> <!-- / .row -->
            <div class="row mt-5 mb-10">
                <!-- Card -->
                @foreach ($strukturOrganisasi as $organisasi)
                    <div class="col-4">
                        <a class="card shadow-light-lg mt-8" href="#">

                            <!-- Image -->
                            <div class="card-zoom">
                                <img class="card-img" src="{{ Storage::url('struktur_organisasi/' . $organisasi->foto) }}"
                                    alt="..." height="400px">
                            </div>

                            <!-- Overlay -->
                            <div class="card-img-overlay card-img-overlay-hover">
                                <div class="card-body bg-white">

                                    <!-- Shape -->
                                    <div class="shape shape-bottom-100 shape-fluid-x text-white">

                                    </div>

                                    <!-- Preheading -->
                                    <h6 class="text-uppercase mb-1 text-muted">Jabatan</h6>
                                    <h6 class="mb-1">{{ $organisasi->jabatan }}</h6>
                                    <hr class="my-0">

                                    <h6 class="text-uppercase mb-1 text-muted">Nama</h6>
                                    <h6 class="mb-1">{{ $organisasi->nama }}</h6>
                                    <hr class="my-0">

                                    <h6 class="text-uppercase mb-1 text-muted">Pekerjaan</h6>
                                    <h6 class="mb-1">{{ $organisasi->pekerjaan }}</h6>
                                    <hr class="my-0">

                                    <h6 class="text-uppercase mb-1 text-muted">Pendidikan</h6>
                                    <h6 class="mb-1">{{ $organisasi->pendidikan }}</h6>
                                    <hr class="my-0">

                                    <h6 class="text-uppercase mb-1 text-muted">Email</h6>
                                    <h6 class="mb-1">{{ $organisasi->email }}</h6>
                                    <hr class="my-0">
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@push('script')
@endpush
