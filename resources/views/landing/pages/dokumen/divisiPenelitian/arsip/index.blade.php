@extends('landing.layouts.main')

@section('title')
    Arsip
@endsection

@push('style')
@endpush

@section('content')
    <section class="pt-5 pt-md-5 mb-10" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h2 class="fw-bold">
                        <span class="text-danger">Arsip</span>
                    </h2>

                    <p class="fs-lg text-muted mb-9">
                        Divisi Penelitian dan Pengabdian
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row mt-5">
                @component('dashboard.components.dataTables.index',
                    [
                        'id' => 'table-data',
                        'th' => ['No', 'Nama', 'Tanggal Upload', 'Dokumen'],
                    ])
                @endcomponent
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection

@push('script')
    <script>
        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            "autoWidth": true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('dokumen/divisi-penelitian/arsip') }}",
                data: function(d) {
                    d.jenisDokumen = $('#jenis_dokumen_filter').val();
                    d.search = $('input[type="search"]').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'tanggal_upload',
                    name: 'tanggal_upload',
                    className: 'text-center text-nowrap',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: true,
                    searchable: true
                },
            ],
        });
    </script>
@endpush
