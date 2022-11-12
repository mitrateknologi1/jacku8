<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/landing') }}/img/logo-upsp.png" class="navbar-brand-img" alt="...">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-x"></i>
            </button>

            <!-- Navigation -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarLandings" href="{{ url('/') }}" aria-haspopup="true"
                        aria-expanded="false">
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown"
                        href="#" aria-haspopup="true" aria-expanded="false">
                        Layanan
                    </a>
                    <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                        <div class="list-group list-group-flush">
                            <a class="list-group-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-divisi-kurikulum">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-book"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Divisi Kurikulum dan Pembelajaran
                                    </h6>

                                    <!-- Text -->
                                    <p class="fs-sm text-gray-700 mb-0">
                                        Dokumen kurikulum, modul, bahan ajar, RPS, dan arsip kurikulum.
                                    </p>

                                </div>
                            </a>
                            <a class="list-group-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-divisi-penelitian">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-search"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Divisi Penelitian dan Pengabdian
                                    </h6>

                                    <!-- Text -->
                                    <p class="fs-sm text-gray-700 mb-0">
                                        Dokumen penelitian, monitoring dan evaluasi penelitian, serta pengabdian
                                        pada masyarakat.
                                    </p>

                                </div>
                            </a>
                            <a class="list-group-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#modal-divisi-kerjasama">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-edit"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Divisi Kerjasama dan Publikasi Jurnal
                                    </h6>

                                    <!-- Text -->
                                    <p class="fs-sm text-gray-700 mb-0">
                                        Arsip kerjasama dan pengembangan publikasi jurnal.
                                    </p>

                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" id="navbarLandings" href="{{ url('daftar-berita') }}" aria-haspopup="true"
                        aria-expanded="false">
                        Berita
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown"
                        href="#" aria-haspopup="true" aria-expanded="false">
                        Tentang
                    </a>
                    <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                        <div class="list-group list-group-flush">
                            <a class="list-group-item" href="{{ url('/sejarah') }}">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-clock"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Sejarah UPSP
                                    </h6>

                                </div>
                            </a>
                            <a class="list-group-item" href="{{ url('/visi-misi') }}">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-list"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Visi dan Misi
                                    </h6>

                                </div>
                            </a>
                            <a class="list-group-item" href="{{ url('struktur-organisasi') }}">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-users"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Struktur Organisasi
                                    </h6>

                                </div>
                            </a>
                            <a class="list-group-item" href="{{ url('/tupoksi') }}">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-briefcase"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Tupoksi UPSP
                                    </h6>

                                </div>
                            </a>
                            <a class="list-group-item" href="{{ url('profil-kami') }}">

                                <!-- Icon -->
                                <div class="icon icon-sm text-danger">
                                    <i class="fe fe-user"></i>
                                </div>

                                <!-- Content -->
                                <div class="ms-4">

                                    <!-- Heading -->
                                    <h6 class="fw-bold text-uppercase text-danger mb-0">
                                        Profil Kami
                                    </h6>

                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- Button -->
            @if (Auth::check())
                <a class="navbar-btn btn btn-sm btn-danger lift ms-auto" href="{{ url('/dashboard') }}">
                    Dashboard
                </a>
            @else
                <a class="navbar-btn btn btn-sm btn-danger lift ms-auto" href="{{ url('/login') }}">
                    Masuk
                </a>
            @endif


        </div>

    </div>
</nav>
