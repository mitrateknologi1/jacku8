@extends('dashboard.layouts.main')

@section('title')
    Sejarah UPSP
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
            <a href="#">Sejarah UPSP</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Sejarah UPSP</div>
                        <div class="card-tools">
                            @component('dashboard.components.buttons.edit',
                                [
                                    'id' => 'btn-tambah',
                                    'class' => '',
                                    'url' => url('manajemen-web/sejarah/' . $sejarah->id . '/edit'),
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {!! $sejarah->isi !!}
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
            $('#manajemen-web-sejarah').addClass('active');
        })
    </script>
@endpush
