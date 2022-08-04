@extends('landing.layouts.main')

@section('title')
    Sejarah UPSP
@endsection

@push('style')
@endpush

@section('content')
    <section class="pt-5 pt-md-5" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Sejarah UPSP</span>
                    </h2>

                </div>
            </div> <!-- / .row -->
            <div class="row mt-5">
                {!! $sejarah->isi !!}
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@push('script')
@endpush
