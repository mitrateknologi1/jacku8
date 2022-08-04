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

    <!-- Title -->
    <title>UPSP Fakultas Teknik | Login</title>
</head>

<body>

    <!-- CONTENT -->
    <section>
        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center gx-0 min-vh-100">
                <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">

                    <!-- Heading -->
                    <h1 class="mb-0 fw-bold ">
                        Masuk
                    </h1>

                    @if (session('error'))
                        <div class="ml-2 span text-danger mb-5">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form class="mb-6" action="{{ url('/login') }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="form-group">
                            <label class="form-label" for="email">
                                Username
                            </label>
                            <input type="text" class="form-control" id="username" placeholder="Masukan Username"
                                name="username" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-5">
                            <label class="form-label" for="password">
                                Password
                            </label>
                            <input type="password" class="form-control" id="password" placeholder="Masukkan Password"
                                name="password" required>
                        </div>

                        <!-- Submit -->
                        <button class="btn w-100 btn-danger" type="submit">
                            Masuk
                        </button>

                    </form>

                    <!-- Text -->
                    <p class="mb-0 fs-sm text-muted">
                        <a href="{{ url('/') }}"><i class="fe fe-arrow-left-circle"></i> Kembali Ke Halaman
                            Utama</a>.
                    </p>

                </div>
                <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

                    <!-- Image -->
                    <div class="h-100 w-cover bg-cover"
                        style="background-image: url({{ asset('assets/landing') }}/img/covers/login-cover.jpg);">
                    </div>

                    <!-- Shape -->
                    <div class="shape shape-start shape-fluid-y text-white">
                        <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor" />
                        </svg>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <!-- Map JS -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/landing') }}/js/vendor.bundle.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/landing') }}/js/theme.bundle.js"></script>

</body>

</html>
