@extends('dashboard.layouts.main')

@section('title')
    Akun
@endsection

@push('style')
    <style>
        .preview-img {
            max-height: 256px;
            height: auto;
            width: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 5px;
        }

        #img_contain {
            border-radius: 5px;
            /*  border:1px solid grey;*/
            width: auto;
        }

        .alert {
            text-align: center;
        }

        .loading {
            animation: blinkingText ease 2.5s infinite;
        }

        @keyframes blinkingText {
            0% {
                color: #000;
            }

            50% {
                color: #transparent;
            }

            99% {
                color: transparent;
            }

            100% {
                color: #000;
            }
        }

        .custom-file-label {
            cursor: pointer;
        }
    </style>
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
            <a href="#">Master Data</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Edit Akun</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Edit Akun</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.masterData.akun')
                                @slot('daftarGolongan', $daftarGolongan)
                                @slot('daftarJabatanFungsional', $daftarJabatanFungsional)
                                @slot('daftarProdi', $daftarProdi)
                                @slot('form_id', 'form-tambah')
                                @slot('action', url('/master-data/akun/' . $user->id))
                                @slot('method', 'PUT')
                                @slot('back_url', url('/master-data/akun'))
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#master-akun').addClass('active');
            $('#username').val('{{ $user->username }}');
            $('#role').val('{{ $user->role }}').trigger('change');
            $('#nama').val('{{ $user->profil->nama }}');
            $('#nidn').val('{{ $user->profil->nidn }}');
            $('#nip').val('{{ $user->profil->nip }}');
            $('#tempat_lahir').val('{{ $user->profil->tempat_lahir }}');
            $('#tanggal_lahir').val('{{ $user->profil->tanggal_lahir }}');
            $('#golongan').val('{{ $user->profil->golongan_id }}').trigger('change');
            $('#jabatan_fungsional').val('{{ $user->profil->jabatan_fungsional_id }}').trigger('change');
            $('#prodi').val('{{ $user->profil->prodi_id }}').trigger('change');
            $('#preview-foto').attr('src', "{{ Storage::url('/akun/foto/' . $user->profil->foto) }}");
        })
    </script>
@endpush
