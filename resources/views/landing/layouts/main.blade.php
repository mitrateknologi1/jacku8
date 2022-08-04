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
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-kurikulum/rps') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> RPS</a>
                        </div>
                        <div class="col-4 mt-2">
                            <a href="{{ url('/dokumen/divisi-kurikulum/arsip') }}" class="btn btn-danger col-12"><i
                                    class="fe fe-file"></i> Arsip</a>
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
