@extends('landing.layouts.main')

@section('title')
    Pengabdian
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
                        <span class="text-danger">Pengabdian</span>
                    </h2>

                    <p class="fs-lg text-muted mb-9">
                        Divisi Penelitian dan Pengabdian
                    </p>

                </div>
            </div> <!-- / .row -->
            <div class="row mb-4">
                <div class="col">
                    @component('dashboard.components.formElements.select',
                        [
                            'label' => 'Skema Pengabdian',
                            'id' => 'skema_filter',
                            'name' => 'skema_filter',
                            'class' => 'select2 filter',
                            'wajib' => '<sup class="text-danger">*</sup>',
                        ])
                        @slot('options')
                            <option value="Semua">Semua</option>
                            @foreach ($daftarSkema as $skema)
                                <option value="{{ $skema->id }}">{{ $skema->nama }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
                <div class="col">
                    @component('dashboard.components.formElements.select',
                        [
                            'label' => 'Sumber Dana',
                            'id' => 'sumber_dana_filter',
                            'name' => 'sumber_dana_filter',
                            'class' => 'select2 filter',
                            'wajib' => '<sup class="text-danger">*</sup>',
                        ])
                        @slot('options')
                            <option value="Semua">Semua</option>
                            @foreach ($daftarSumberDana as $sumberDana)
                                <option value="{{ $sumberDana->id }}">{{ $sumberDana->nama }}</option>
                            @endforeach
                        @endslot
                    @endcomponent
                </div>
            </div>
            <div class="row mt-5">
                @component('dashboard.components.dataTables.index',
                    [
                        'id' => 'table-data',
                        'th' => ['No', 'Nama', 'Ketua', 'Anggota', 'Tahun', 'Besar Dana', 'Skema', 'Sumber Dana', 'File'],
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
                url: "{{ url('dokumen/divisi-penelitian/pengabdian') }}",
                data: function(d) {
                    d.jenisDokumen = $('#jenis_dokumen_filter').val();
                    d.skema = $('#skema_filter').val();
                    d.sumberDana = $('#sumber_dana_filter').val();
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
                    data: 'ketua',
                    name: 'ketua',
                    className: 'text-center text-nowrap',
                },
                {
                    data: 'anggota',
                    name: 'anggota',
                    className: 'text-center',
                },
                {
                    data: 'tahun',
                    name: 'tahun',
                    className: 'text-center text-nowrap',
                },
                {
                    data: 'besar_dana',
                    name: 'besar_dana',
                    className: 'text-center',
                },
                {
                    data: 'skema',
                    name: 'skema',
                    className: 'text-center',
                },
                {
                    data: 'sumber_dana',
                    name: 'sumber_dana',
                    className: 'text-center',
                },
                {
                    data: 'file',
                    name: 'file',
                    className: 'text-center',
                },
            ],
        });

        $('.filter').change(function() {
            table.draw();
        })
    </script>
@endpush
