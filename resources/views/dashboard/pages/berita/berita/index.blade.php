@extends('dashboard.layouts.main')

@section('title')
    Berita
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
            <a href="#">Berita</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Berita</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Berita</div>
                        <div class="card-tools">
                            @component('dashboard.components.buttons.add',
                                [
                                    'id' => 'btn-tambah',
                                    'class' => '',
                                    'url' => url('/berita/berita/create'),
                                ])
                            @endcomponent
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Kategori',
                                    'id' => 'kategori',
                                    'name' => 'kategori',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value=""></option>
                                    <option value="Semua">Semua</option>
                                    @foreach ($listKategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Sumber',
                                    'id' => 'sumber',
                                    'name' => 'sumber',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value=""></option>
                                    <option value="Semua">Semua</option>
                                    <option value="Divisi Kurikulum / Penelitian">Divisi Kurikulum / Penelitian</option>
                                    <option value="Divisi Pengabdian / Kerja Sama">Divisi Pengabdian / Kerja Sama</option>
                                    <option value="Divisi Jurnal">Divisi Jurnal</option>
                                @endslot
                            @endcomponent
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card fieldset">
                                @component('dashboard.components.dataTables.index',
                                    [
                                        'id' => 'table-data',
                                        'th' => ['No', 'Judul', 'Kategori', 'Sumber', 'Aksi'],
                                    ])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).on('click', '#btn-delete', function() {
            let id = $(this).val();
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'error',
                text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Hapus',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: "{{ url('berita/berita') }}" + '/' + id,
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Dihapus", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    table.draw();
                                })
                            } else {
                                swal("Gagal", "Data Gagal Dihapus", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000,
                                });
                            }
                        }
                    })
                }
            });
        })

        var table = $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
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
                url: "{{ url('berita/berita') }}",
                data: function(d) {
                    d.sumber = $('#sumber').val();
                    d.kategori = $('#kategori').val();
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
                    data: 'judul',
                    name: 'judul',
                    className: 'text-center',
                },
                {
                    data: 'kategori',
                    name: 'kategori',
                    className: 'text-center',
                },
                {
                    data: 'sumber',
                    name: 'sumber',
                    className: 'text-center',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: true,
                    searchable: true
                },

            ],
            columnDefs: [
                // {
                //     targets: 4,
                //     visible: false,
                // },

            ],
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#berita-berita').addClass('active');
        })

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').removeClass('d-none');
                $('.' + key + '-error').text(value);
            });
        }

        function resetError() {
            resetErrorElement('nama');
        }

        function resetModal() {
            resetError();
            $('#form-tambah')[0].reset();
        }

        function resetErrorElement(key) {
            $('.' + key + '-error').addClass('d-none');
        }

        $('.filter').change(function() {
            table.draw();
        })
    </script>
@endpush
