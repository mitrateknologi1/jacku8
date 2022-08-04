@extends('dashboard.layouts.main')

@section('title')
    Dashboard
@endsection

@push('style')
@endpush

@section('breadcrumb')
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Manajemen Web</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Dashboard</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="far fa-newspaper"></i>
                    </span>
                    <div>
                        <h5 class="mb-0"><b>Berita</b></h5>
                        <small class="text-muted">{{ $totalBerita }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="fas fa-archive"></i>
                    </span>
                    <div>
                        <h5 class="mb-0"><b>Dokumen</b></h5>
                        <small class="text-muted">{{ $totalDokumen }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <div>
                        <h5 class="mb-0"><b>Program Studi</b></h5>
                        <small class="text-muted">{{ $totalProdi }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-danger mr-3">
                        <i class="fas fa-users"></i>
                    </span>
                    <div>
                        <h5 class="mb-0"><b>Dosen</b></h5>
                        <small class="text-muted">{{ $totalDosen }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        })
    </script>
@endpush
