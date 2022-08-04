@extends('landing.layouts.main')

@section('title')
    Tupoksi
@endsection

@push('style')
@endpush

@section('content')
    <section class="pt-5 pt-md-5 mb-5" id="about">
        @foreach ($listTupoksi as $tupoksi)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center mt-5">

                        <!-- Heading -->
                        <h2 class="fw-bold">
                            <span class="text-danger">{{ $tupoksi->nama }}</span>
                        </h2>

                    </div>
                </div> <!-- / .row -->
                <div class="row mt-5">
                    {!! $tupoksi->isi !!}
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        @endforeach

    </section>
@endsection

@push('script')
@endpush
