@extends('landing.layouts.main')

@section('title')
    Berita
@endsection

@push('style')
@endpush

@section('content')
    <!-- FLEXIBILITY -->
    <section class="pt-8 pt-md-11 bg-gradient-light-white mb-10">
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
            <form action="" method="GET">
                <div class="row mb-10">
                    <div class="col">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Kategori',
                                'id' => 'kategori',
                                'name' => 'kategori',
                                'class' => '',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="">Semua</option>
                                @foreach ($listKategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col">
                        @component('dashboard.components.formElements.select',
                            [
                                'label' => 'Sumber',
                                'id' => 'sumber',
                                'name' => 'sumber',
                                'class' => '',
                                'wajib' => '<sup class="text-danger">*</sup>',
                            ])
                            @slot('options')
                                <option value="">Semua</option>
                                <option value="Divisi Kurikulum / Penelitian">Divisi Kurikulum / Penelitian</option>
                                <option value="Divisi Pengabdian / Kerja Sama">Divisi Pengabdian / Kerja Sama</option>
                                <option value="Divisi Jurnal">Divisi Jurnal</option>
                            @endslot
                        @endcomponent
                    </div>
                    <div class="col-2 position-relative">
                        <button class="btn btn-primary col-12 position-absolute bottom-0 start-50 translate-middle-x">Cari
                        </button>
                    </div>
                </div>
            </form>
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
                <div class="d-flex justify-content-center mt-5">
                    {{ $listBerita->links() }}
                </div>

            </div> <!-- / .row -->

        </div> <!-- / .container -->
    </section>
@endsection


@push('script')
@endpush
