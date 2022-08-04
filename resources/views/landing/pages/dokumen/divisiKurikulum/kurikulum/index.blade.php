@extends('landing.layouts.main')

@section('title')
    Kurikulum
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
                        <span class="text-danger">Kurikulum</span>
                    </h2>

                    <p class="fs-lg text-muted mb-9">
                        Divisi Kurikulum dan Pembelajaran
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row mb-4">
                <div class="col">
                    @component('dashboard.components.formElements.select',
                        [
                            'label' => 'Program Studi',
                            'id' => 'prodi_filter',
                            'name' => 'prodi_filter',
                            'class' => 'select2 filter',
                            'wajib' => '<sup class="text-danger">*</sup>',
                        ])
                        @slot('options')
                            <option value="Semua">Semua</option>
                            @foreach ($listProdi as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <div class="row mt-5">
                @component('dashboard.components.dataTables.index',
                    [
                        'id' => 'table-data',
                        'th' => ['No', 'Nama', 'Program Studi', 'Tahun', 'Tanggal Upload', 'Dokumen'],
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
            dom: 'lBfrtip',
            "autoWidth": true,
            buttons: [{
                    extend: 'excel',
                    className: 'btn btn-sm btn-light-success px-2 btn-export-table d-inline ml-3 font-weight',
                    text: '<i class="bi bi-file-earmark-arrow-down"></i> Ekspor Data',
                    exportOptions: {
                        modifier: {
                            order: 'index', // 'current', 'applied', 'index',  'original'
                            page: 'all', // 'all',     'current'
                            search: 'applied' // 'none',    'applied', 'removed'
                        },
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn btn-sm btn-light-success px-2 btn-export-table d-inline ml-3 font-weight',
                    text: '<i class="bi bi-eye-fill"></i> Tampil/Sembunyi Kolom',
                }
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ url('/dokumen/divisi-kurikulum/kurikulum') }}",
                data: function(d) {
                    d.prodi = $('#prodi_filter').val();
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
                    data: 'prodi',
                    name: 'prodi',
                    className: 'text-center text-nowrap',
                },
                {
                    data: 'tahun',
                    name: 'tahun',
                    className: 'text-center',
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

        $('.filter').change(function() {
            table.draw();
        })
    </script>
@endpush
