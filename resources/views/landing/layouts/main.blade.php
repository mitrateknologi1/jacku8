<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/landing') }}/favicon/favicon2.png" type="image/x-icon" />

    <!-- Map CSS -->
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" />

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/libs.bundle.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/landing') }}/css/theme.bundle.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <style>
        .nav-link:hover {
            color: #d9293d !important;
        }

        #logo-sipenaemas,
        #logo-untad,
        #logo-untad2 {
            max-height: none;
            height: 25px !important;
        }
    </style>

    @stack('style')

    <!-- Title -->
    <title>UPSP Fakultas Teknik | @yield('title')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('landing.layouts.header')

    @yield('content')
    <div class="modal fade" id="modal-divisi-kurikulum" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header p-5">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Pilih Dokumen Divisi Kurikulum dan
                        Pembelajaran </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-kurikulum/kurikulum') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Kurikulum</a>
                        </div>
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-kurikulum/modul') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Modul</a>
                        </div>
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-kurikulum/bahan-ajar') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Bahan Ajar</a>
                        </div>
                        <div class="col-6 mt-4">
                            <a href="{{ url('/dokumen/divisi-kurikulum/rps') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> RPS</a>
                        </div>
                        <div class="col-6 mt-4">
                            <a href="{{ url('/dokumen/divisi-kurikulum/arsip') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Arsip</a>
                        </div>
                        <div class="col-12 mt-4">
                            <a href="https://fatek.untad.ac.id/vibel/" class="btn btn-danger col-12"
                                target="_blank"><img src="{{ asset('assets/landing/') }}/img/untad.png" alt=""
                                    id="logo-untad"> <span class="align-middle ms-2"> Virtual Blended and Learning
                                    (VIBEL)</span></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-5">
                    <button type="button" class="btn btn-sm btn-danger-soft" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-divisi-penelitian" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header p-5">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Pilih Dokumen Divisi Penelitian dan
                        Pengabdian </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-penelitian/penelitian') }}"
                                class="btn btn-danger col-12"><i class="fe fe-file"></i> Penelitian</a>
                        </div>
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-penelitian/pengabdian') }}"
                                class="btn btn-danger col-12"><i class="fe fe-file"></i> Pengabdian</a>
                        </div>
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-penelitian/arsip') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Arsip</a>
                        </div>
                        <div class="col-12 mt-4">
                            <a href="https://www.elppmuntad.org/" class="btn btn-danger col-12" target="_blank"><img
                                    src="{{ asset('assets/landing/') }}/img/untad.png" alt="" id="logo-untad2"
                                    class="mt-1 me-n2"> <span class="align-middle ms-2"><img
                                        src="{{ asset('assets/landing/') }}/img/sipenaemas.png" alt=""
                                        id="logo-sipenaemas"><span class="align-middle ms-2">
                                        SIPENAEMAS</span></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-5">
                    <button type="button" class="btn btn-sm btn-danger-soft" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-divisi-kerjasama" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header p-5">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Pilih Dokumen Divisi Kerjasama dan
                        Publikasi Jurnal </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ url('/dokumen/divisi-jurnal/arsip') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Arsip</a>
                        </div>
                        <div class="col-12 mt-4">
                            <a href="https://mou.untad.ac.id/" class="btn btn-danger col-12" target="_blank"><img
                                    src="{{ asset('assets/landing/') }}/img/simou.png" alt=""
                                    id="logo-sipenaemas"><span class="align-middle ms-2">
                                    SIMOU</span></a>
                        </div>
                    </div>
                    <h5 class="fw-bold my-5 text-center">Jurnal Fakultas Teknik : </h5>
                    <div class="row">
                        <div class="col-12">
                            <a href="https://www.spsdcommunity.org/" class="btn btn-danger col-12" target="_blank"><i
                                    class="fe fe-globe"></i> SPSD International Community</a>
                        </div>
                        <div class="col-12">
                            <a href="http://jurnal.untad.ac.id/jurnal/index.php/scientico"
                                class="btn btn-danger col-12 mt-4" target="_blank"><img
                                    src="{{ asset('assets/landing/') }}/img/untad.png" alt=""
                                    id="logo-untad"> <span class="align-middle ms-2"> ScientiCO : Computer Science and
                                    Informatics Journal</span></a>
                        </div>
                        <div class="col-12">
                            <a href="https://foristek.fatek.untad.ac.id/index.php/foristek/index"
                                class="btn btn-danger col-12 mt-4" target="_blank"><img
                                    src="{{ asset('assets/landing/') }}/img/untad.png" alt=""
                                    id="logo-untad"> <span class="align-middle ms-2"> Forum Teknik Elektro dan
                                    Informasi</span></a>
                        </div>
                        <div class="col-12">
                            <a href="https://new.jurnal.untad.ac.id/index.php/renstra"
                                class="btn btn-danger col-12 mt-4" target="_blank"><img
                                    src="{{ asset('assets/landing/') }}/img/untad.png" alt=""
                                    id="logo-untad" class="me-2"><img
                                    src="{{ asset('assets/landing/') }}/img/renstra.png" alt=""
                                    id="logo-untad"> <span class="align-middle ms-2"> Rekonstruksi
                                    Tadulako</span></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-5">
                    <button type="button" class="btn btn-sm btn-danger-soft" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    @include('landing.layouts.footer')
    </section>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/landing') }}/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/landing') }}/js/theme.bundle.js"></script>

    <script src="{{ asset('assets/dashboard') }}/js/core/jquery.3.2.1.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/dashboard') }}/js/plugin/select2/select2.full.min.js"></script>

    <script>
        // $('.select2').select2({
        //     placeholder: "- Pilih Salah Satu -",
        //     theme: "bootstrap"
        // })
    </script>

    @stack('script')
</body>

</html>
