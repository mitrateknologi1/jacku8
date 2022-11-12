@extends('landing.layouts.main')

@section('title')
    Beranda
@endsection

@push('style')
@endpush

@section('content')
    <section class="border-bottom">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-12 col-md-6 offset-md-1 order-md-2">

                    <!-- Slider (mobile) -->
                    <div class="d-md-none img-cover"
                        data-flickity='{"imagesLoaded": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false}'>
                        <div class="w-100">

                            <!-- Image -->
                            <img src="{{ asset('assets/landing') }}/img/covers/hero-1.jpg" alt="..." class="img-fluid">

                        </div>
                        <div class="w-100">

                            <!-- Image -->
                            <img src="{{ asset('assets/landing') }}/img/covers/hero-2.jpg" alt="..." class="img-fluid">

                        </div>
                        <div class="w-100">

                            <!-- Image -->
                            <img src="{{ asset('assets/landing') }}/img/covers/hero-3.jpg" alt="..." class="img-fluid">

                        </div>
                    </div>

                    <!-- Slider -->
                    <div class="position-relative h-100 vw-50 d-none d-md-block" data-aos="fade-left">

                        <!-- Slider -->
                        <div class="flickity-button-bottom flickity-button-white h-100 w-100"
                            data-flickity='{"imagesLoaded": true, "setGallerySize": false, "wrapAround": true, "pageDots": false}'>
                            @foreach ($tampilanBeranda as $tampilan)
                                <div class="w-100 h-100 bg-cover"
                                    style="background-image: url({{ Storage::url('tampilan_beranda/' . $tampilan->foto) }});">
                                </div>
                            @endforeach
                        </div>

                        <!-- Shape -->
                        <div class="shape shape-start shape-fluid-y svg-shim text-white">
                            <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor" />
                            </svg>
                        </div>

                    </div>

                </div>
                <div class="col-12 col-md-5 py-8 py-md-14 order-md-1" data-aos="fade-right">

                    <!-- Heading -->
                    <h1 class="display-3">
                        <span class="fw-bold">UPSP </span> <span class="text-danger fw-bold">Fakultas Teknik</span>
                    </h1>

                    <!-- Text -->
                    <p class="lead text-muted mb-6 mb-md-8">
                        Unit Pengembangan Sumber Daya Pembelajaran
                        Fakultas Teknik, Universitas Tadulako, Sulawesi Tengah
                    </p>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <section class="pt-8 pt-md-10" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Layanan</span>
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-muted mb-9">
                        Silahkan pilih layanan sesuai divisi yang tersedia
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">

                    <!-- Card -->
                    <div class="card card-border border-danger shadow-lg mb-6 mb-md-8 lift lift-lg">
                        <div class="card-body text-center">

                            <!-- Icon -->
                            <div class="icon-circle bg-danger text-white mb-5">
                                <i class="fe fe-book"></i>
                            </div>

                            <!-- Heading -->
                            <h4 class="fw-bold">
                                <a href="#" class="text-decoration-none text-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-divisi-kurikulum">
                                    Divisi Kurikulum dan Pembelajaran
                                </a>
                            </h4>

                            <!-- Text -->
                            <p class="text-gray-700 mb-5">
                                Dokumen kurikulum, modul, bahan ajar, RPS, dan arsip kurikulum.
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <!-- Card -->
                    <div class="card card-border border-danger shadow-lg mb-6 mb-md-8 lift lift-lg">
                        <div class="card-body text-center">

                            <!-- Icon -->
                            <div class="icon-circle bg-danger text-white mb-5">
                                <i class="fe fe-search"></i>
                            </div>

                            <!-- Heading -->
                            <h4 class="fw-bold">
                                <a href="#" class="text-decoration-none text-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-divisi-penelitian">
                                    Divisi Penelitian dan Pengabdian
                                </a>
                            </h4>

                            <!-- Text -->
                            <p class="text-gray-700 mb-5">
                                Dokumen penelitian, monitoring dan evaluasi penelitian, serta pengabdian pada
                                masyarakat.
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-lg-4">

                    <!-- Card -->
                    <div class="card card-border border-danger shadow-lg mb-6 mb-md-8 lift lift-lg">
                        <div class="card-body text-center">

                            <!-- Icon -->
                            <div class="icon-circle bg-danger text-white mb-5">
                                <i class="fe fe-edit"></i>
                            </div>

                            <!-- Heading -->
                            <h4 class="fw-bold">
                                <a href="#" class="text-decoration-none text-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-divisi-kerjasama">
                                    Divisi Kerjasama dan Publikasi Jurnal
                                </a>
                            </h4>

                            <!-- Text -->
                            <p class="text-gray-700 mb-5">
                                Arsip kerjasama dan pengembangan publikasi <br> jurnal.
                            </p>

                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>


    <!-- FLEXIBILITY -->
    <section class="pt-8 pt-md-11 bg-gradient-light-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Berita</span>
                    </h2>

                    <!-- Text -->
                    <p class="fs-lg text-muted mb-9">
                        Berita terbaru seputar UPSP Fakultas Teknik UNTAD
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row">
                @forelse ($listBerita as $berita)
                    <div class="col-12 col-md-4" data-aos="fade-up">

                        <!-- Card -->
                        <div class="card shadow-light-lg mb-6 mb-md-0 lift lift-lg">

                            <!-- Image -->
                            <img src="{{ Storage::url('berita/foto/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                class="card-img-top" height="250px">

                            <!-- Shape -->
                            <div class="position-relative">
                                <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                                    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body position-relative">

                                <!-- Badge -->
                                <div class="position-relative text-end mt-n8 me-n4 mb-3">
                                    <span class="badge rounded-pill bg-danger">
                                        <span class="h6 text-uppercase">{{ $berita->kategoriBerita->nama }}</span>
                                    </span>
                                </div>

                                <!-- Heading -->
                                <h3>
                                    {{ $berita->judul }}
                                </h3>

                                <!-- Text -->
                                <p class="text-muted">
                                    {{ $berita->deskripsi_singkat }}
                                </p>

                                <!-- Link -->
                                <a href="{{ url('detail-berita/' . $berita->id) }}"
                                    class="fw-bold text-decoration-none text-danger">
                                    Lihat Berita <i class="fe fe-arrow-right ms-3"></i>
                                </a>

                            </div>

                        </div>

                    </div>
                @empty
                    <p class="fs-lg text-muted mb-9 text-center">
                        Berita Tidak Ada
                    </p>
                @endforelse


            </div> <!-- / .row -->
            @if ($listBerita)
                <div class="text-center">
                    <a href="{{ url('daftar-berita') }}" class="btn btn-sm btn-danger shadow lift me-1 mt-7 ">
                        Selengkapnya <i class="fe fe-arrow-right d-none d-md-inline ms-3"></i>
                    </a>
                </div>
            @endif

        </div> <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <section class="bg-danger mt-11">
        <footer class="py-8 py-md-11 bg-danger ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 offset-md-4 col-lg-12 offset-lg-0 text-center">

                        <span class="badge rounded-pill bg-light mb-7">
                            <span class="h6 text-uppercase">Kontak</span>
                        </span>

                        <div class="row">
                            <div class="col-12 col-lg-12 mt-2 mb-5">
                                <div class="card card-border">
                                    <div class="card-body">
                                        <div class="icon-circle bg-danger text-light">
                                            <i class="fe fe-compass"></i>
                                        </div>
                                        <p class="fs-lg text-gray-700 mt-3 mb-0">
                                            Alamat <br>
                                            {{ $kontak[0]->isi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mt-2">
                                <div class="card card-border">
                                    <div class="card-body">
                                        <div class="icon-circle bg-danger text-light">
                                            <i class="fe fe-mail"></i>
                                        </div>
                                        <p class="fs-lg text-gray-700 mt-3 mb-0">
                                            Email <br>
                                            {{ $kontak[1]->isi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mt-2">
                                <div class="card card-border">
                                    <div class="card-body">
                                        <div class="icon-circle bg-danger text-light">
                                            <i class="fe fe-phone"></i>
                                        </div>
                                        <p class="fs-lg text-gray-700 mt-3 mb-0">
                                            Telepon <br>
                                            {{ $kontak[2]->isi }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </footer>
    @endsection

    @push('script')
    @endpush
