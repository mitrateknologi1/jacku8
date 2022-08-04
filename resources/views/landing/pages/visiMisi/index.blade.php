@extends('landing.layouts.main')

@section('title')
    Visi dan Misi
@endsection

@push('style')
@endpush

@section('content')
    <section class="pt-5 pt-md-5" id="about">
        @foreach ($listVisiMisi as $visiMisi)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center mt-5">

                        <!-- Heading -->
                        <h2 class="fw-bold">
                            <span class="text-danger">{{ $visiMisi->nama }}</span>
                        </h2>

                    </div>
                </div> <!-- / .row -->
                <div class="row mt-5">
                    {!! $visiMisi->isi !!}
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        @endforeach

    </section>
@endsection

@push('script')
@endpush
