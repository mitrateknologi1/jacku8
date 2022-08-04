@extends('dashboard.layouts.main')

@section('title')
    Berita
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
            <a href="#">Berita</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Ubah Berita</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Berita</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @component('dashboard.components.forms.berita.berita')
                                @slot('listKategori', $listKategori)
                                @slot('form_id', 'form-tambah')
                                @slot('berita', $berita)
                                @slot('action', url('/berita/berita/' . $berita->id))
                                @slot('method', 'PUT')
                                @slot('back_url', url('/berita/berita'))
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
            $('#berita-berita').addClass('active');
            $('#preview-foto').attr('src', "{{ Storage::url('/berita/foto/' . $berita->foto) }}");
            $('#kategori').val('{{ $berita->kategori_berita_id }}').trigger('change');
            $('#sumber').val('{{ $berita->sumber }}').trigger('change');
        })
    </script>
@endpush
