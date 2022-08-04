@extends('dashboard.layouts.main')

@section('title')
    Struktur Organisasi
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
            <a href="#">Struktur Organisasi</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        @foreach ($listStruktur as $struktur)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ Storage::url('struktur_organisasi/' . $struktur->foto) }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <p class="card-text fw-bold py-0 my-0">Jabatan : </p>
                        <p class="card-text py-0 my-0">{{ $struktur->jabatan }}</p>
                        <hr>

                        <p class="card-text fw-bold py-0 my-0">Nama : </p>
                        <p class="card-text py-0 my-0">{{ $struktur->nama }}</p>
                        <hr>

                        <p class="card-text fw-bold py-0 my-0">Pekerjaan : </p>
                        <p class="card-text py-0 my-0">{{ $struktur->pekerjaan }}</p>
                        <hr>

                        <p class="card-text fw-bold py-0 my-0">Pendidikan : </p>
                        <p class="card-text py-0 my-0">{{ $struktur->pendidikan }}</p>
                        <hr>

                        <p class="card-text fw-bold py-0 my-0">Email : </p>
                        <p class="card-text py-0 my-0">{{ $struktur->email }}</p>

                        @component('dashboard.components.buttons.edit',
                            [
                                'id' => 'btn-tambah',
                                'class' => 'mt-3 col-12 btn-sm',
                                'url' => url('manajemen-web/struktur-organisasi/' . $struktur->id . '/edit'),
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#manajemen-web-struktur-organisasi').addClass('active');
        })
    </script>
@endpush
