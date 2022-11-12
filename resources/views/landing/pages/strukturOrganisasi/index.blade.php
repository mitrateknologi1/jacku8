@extends('landing.layouts.main')

@section('title')
    Struktur Organisasi
@endsection

@push('style')
    <style>
        #body {
            all: revert;
            overflow-x: scroll;
        }

        #body {
            display: grid;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        .tree {
            width: 2500px;
            height: auto;
            text-align: center;
        }

        .tree ul {
            padding-top: 20px;
            position: relative;
            transition: .5s;
        }

        .tree li {
            display: inline-table;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 10px;
            transition: .5s;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 51%;
            height: 10px;
        }

        .tree li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }

        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before,
        .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
            height: 20px;
        }

        .tree li a {
            border: 1px solid #ccc;
            padding: 10px;
            display: inline-grid;
            border-radius: 5px;
            text-decoration-line: none;
            border-radius: 5px;
            transition: .5s;
        }

        .tree li a img {
            width: 100px;
            height: 130px;
            margin-bottom: 10px !important;
            border-radius: 100px;
            margin: auto;
        }

        .tree li a span {
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #666;
            padding: 8px;
            font-size: 12px;
            /* text-transform: uppercase; */
            letter-spacing: 1px;
            font-weight: 500;
        }

        /*Hover-Section*/
        .tree li a:hover,
        .tree li a:hover i,
        .tree li a:hover span,
        .tree li a:hover+ul li a {
            background: #be3c4c;
            color: rgb(255, 255, 255);
            border: 1px solid #ffffff;
        }

        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before {
            border-color: #94a0b4;
        }
    </style>
@endpush

@section('content')
    <section class="pt-5 pt-md-5" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Struktur Organisasi</span>
                    </h2>

                </div>
            </div> <!-- / .row -->
            <div class="row mt-5">

            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <div class="container" id="body">
        <div class="row" id="row">
            <div class="tree">
                <ul>
                    <li> <a href="#"><img
                                src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[0]->foto) }}"><span>{{ $strukturOrganisasi[0]->jabatan }}
                                <br>{{ $strukturOrganisasi[0]->nama }}</span></a>
                        <ul>
                            <li> <a href="#"><img
                                        src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[1]->foto) }}"><span>{{ $strukturOrganisasi[1]->jabatan }}
                                        <br>{{ $strukturOrganisasi[1]->nama }}</span></a>
                                <ul>
                                    <li><a href="#"><img
                                                src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[2]->foto) }}"><span>{{ $strukturOrganisasi[2]->jabatan }}
                                                <br>{{ $strukturOrganisasi[2]->nama }}</span></a> </li>
                                    <li><a href="#"><img
                                                src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[3]->foto) }}"><span>{{ $strukturOrganisasi[3]->jabatan }}
                                                <br>{{ $strukturOrganisasi[3]->nama }}</span></a> </li>
                                    <li><a href="#"><img
                                                src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[4]->foto) }}"><span>{{ $strukturOrganisasi[4]->jabatan }}
                                                <br>{{ $strukturOrganisasi[4]->nama }}</span></a> </li>
                                    <li><a href="#"><img
                                                src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[5]->foto) }}"><span>{{ $strukturOrganisasi[5]->jabatan }}
                                                <br>{{ $strukturOrganisasi[5]->nama }}</span></a>
                                        <ul>
                                            <li><a href="#"><img
                                                        src="{{ Storage::url('struktur_organisasi/' . $strukturOrganisasi[6]->foto) }}"><span>{{ $strukturOrganisasi[6]->jabatan }}
                                                        <br>{{ $strukturOrganisasi[6]->nama }}</span></a> </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var myDiv = $("#body");
        var myRow = $("#row");
        var scrollto = (myRow.width() - myDiv.width()) / 2;
        myDiv.animate({
            scrollLeft: scrollto
        });
    </script>
@endpush
