@extends('landing.layouts.main')

@section('title')
    {{ $berita->judul }}
@endsection

@push('style')
@endpush

@section('content')
    <!-- IMAGE -->
    {{-- <section data-jarallax data-speed=".8" class="py-12 py-md-15 bg-cover jarallax"
        style="background-image: url({{ Storage::url('berita/foto/' . $berita->foto) }});"></section> --}}

    <!-- HEADER -->
    <section class="pt-8 pt-md-11">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">

                    <!-- Heading -->
                    <h1 class="display-4 text-center">
                        {{ $berita->judul }}
                    </h1>

                    <!-- Text -->
                    <p class="lead mb-7 text-center text-muted">
                        {{ $berita->deskripsi_singkat }}
                    </p>

                    <!-- Meta -->
                    <div class="row align-items-center py-5 border-top border-bottom">
                        <!-- Name -->
                        <h6 class="text-uppercase mb-0 text-center">
                            {{ $berita->kategoriBerita->nama . ' | ' . $berita->sumber }}
                        </h6>

                        <!-- Date -->
                        <time class="fs-sm text-muted text-center" datetime="2019-05-20">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                        </time>

                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SECTION -->
    <section class="pt-6 pt-md-8 mb-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8">

                    <!-- Fugure -->
                    <figure class="figure mb-7">

                        <!-- Image -->
                        <img class="figure-img img-fluid rounded lift lift-lg"
                            src="{{ Storage::url('berita/foto/' . $berita->foto) }}" alt="...">

                    </figure>

                    <!-- Text -->
                    <p>
                        {!! $berita->isi !!}
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection


@push('script')
@endpush
