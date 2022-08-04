@extends('dashboard.layouts.main')

@section('title')
    Modul
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
            <a href="#">Divisi Kurikulum</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Modul</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Modul</div>
                        @if (Auth::user()->role != 'dosen')
                            <div class="card-tools">
                                @component('dashboard.components.buttons.add',
                                    [
                                        'id' => 'btn-tambah',
                                        'class' => '',
                                        'url' => '#',
                                    ])
                                @endcomponent
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
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
                                    <option value=""></option>
                                    <option value="Semua">Semua</option>
                                    @foreach ($listProdi as $prodi)
                                        <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                    @endforeach
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Jenis Dokumen',
                                    'id' => 'jenis_dokumen_filter',
                                    'name' => 'jenis_dokumen_filter',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value=""></option>
                                    <option value="Semua">Semua</option>
                                    <option value="Publik">Publik</option>
                                    <option value="Privat">Privat</option>
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
                                        'th' => ['No', 'Nama', 'Program Studi', 'Tahun', 'Tanggal Upload', 'Jenis Dokumen', 'Bahan Pendukung', 'Aksi'],
                                    ])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" role="dialog" id="modal-tambah">
        <form method="POST" id="form-tambah" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-tambah-title">Tambah Modul</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            @component('dashboard.components.formElements.textArea',
                                [
                                    'id' => 'nama',
                                    'type' => 'text',
                                    'label' => 'Nama Modul',
                                    'placeholder' => 'Nama Modul',
                                    'name' => 'nama',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Program Studi',
                                    'id' => 'prodi',
                                    'name' => 'prodi',
                                    'class' => 'select2',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'tahun',
                                    'type' => 'text',
                                    'label' => 'Tahun',
                                    'placeholder' => 'Tahun',
                                    'name' => 'tahun',
                                    'class' => 'numerik',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'tanggal_upload',
                                    'type' => 'text',
                                    'label' => 'Tanggal Upload (Hari-Bulan-Tahun, Contoh : 01-12-2022)',
                                    'placeholder' => 'Hari-Bulan-Tahun',
                                    'name' => 'tanggal_upload',
                                    'class' => 'tanggal',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Jenis Dokumen',
                                    'id' => 'jenis_dokumen',
                                    'name' => 'jenis_dokumen',
                                    'class' => 'select2',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value=""></option>
                                    <option value="Publik">Publik</option>
                                    <option value="Privat">Privat</option>
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'file_upload',
                                    'type' => 'file',
                                    'label' => 'File',
                                    'placeholder' => 'File',
                                    'name' => 'file_upload',
                                    'required' => true,
                                ])
                            @endcomponent
                            <label for="" class="text-muted" id="notif-file">Kosongkan File Jika Tidak Ingin
                                Mengubah file</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @component('dashboard.components.buttons.close')
                        @endcomponent
                        @component('dashboard.components.buttons.submit',
                            [
                                'label' => 'Simpan',
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        var idEdit = '';
        var idProdi = '';
        var aksiTambah = 'tambah';
        $('#btn-tambah').click(function() {
            resetModal();
            idProdi = '';
            getProdi();
            aksiTambah = 'tambah';
            $('#modal-tambah').modal('show');
            $('#modal-tambah-title').html('Tambah Modul');
            $('#notif-file').css("display", "none");
        })

        $(document).on('click', '#btn-edit', function() {
            let id = $(this).val();
            $('#notif-file').css("display", "block");
            idEdit = id;
            resetModal();

            $.ajax({
                url: "{{ url('divisi-kurikulum/modul') }}" + '/' + id + '/edit',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    aksiTambah = 'ubah';
                    $('#modal-tambah').modal('show');
                    $('#modal-tambah-title').html('Ubah Modul');
                    $('#nama').val(response.nama);
                    $('#jenis_dokumen').val(response.jenis_dokumen).trigger('change');
                    $('#tanggal_upload').val(response.tanggal_upload);
                    $('#tahun').val(response.tahun);
                    idProdi = response.prodi_id;
                    getProdi();
                    setTimeout(
                        function() {
                            $('#prodi').val(response.prodi_id).trigger('change');
                        }, 500
                    );
                },
            })
        })

        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            resetError();
            let formData = new FormData(this);
            if (aksiTambah == 'tambah') {
                $.ajax({
                    url: "{{ url('divisi-kurikulum/modul') }}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#modal-tambah').modal('hide');
                            table.draw();
                            swal("Berhasil", "Data Berhasil Tersimpan", {
                                icon: "success",
                                buttons: false,
                                timer: 1000,
                            });
                            resetModal();
                        } else {
                            printErrorMsg(response.error);
                        }
                    },
                    error: function(response) {
                        swal("Gagal", "Data Gagal Ditambahkan", {
                            icon: "error",
                            buttons: false,
                            timer: 1000,
                        });
                    }
                })
            } else {
                formData.append('_method', 'PUT');
                $.ajax({
                    url: "{{ url('divisi-kurikulum/modul') }}" + '/' + idEdit,
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#modal-tambah').modal('hide');
                            table.draw();
                            swal("Berhasil", "Data Berhasil Diubah", {
                                icon: "success",
                                buttons: false,
                                timer: 1000,
                            });
                            resetModal();
                        } else {
                            printErrorMsg(response.error);
                        }
                    },
                    error: function(response) {
                        swal("Gagal", "Data Gagal Diubah", {
                            icon: "error",
                            buttons: false,
                            timer: 1000,
                        });
                    }
                })
            }
        })

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
                        url: "{{ url('divisi-kurikulum/modul') }}" + '/' + id,
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
                url: "{{ url('divisi-kurikulum/modul') }}",
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
                    className: 'text-center'
                },
                {
                    data: 'tanggal_upload',
                    name: 'tanggal_upload',
                    className: 'text-center text-nowrap',
                },
                {
                    data: 'jenis_dokumen',
                    name: 'jenis_dokumen',
                    className: 'text-center',
                },
                {
                    data: 'bahan_pendukung',
                    name: 'bahan_pendukung',
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
        });

        function getProdi() {
            $('#prodi').html('');
            if (aksiTambah == "tambah") {
                $.ajax({
                    url: "{{ url('list/prodi') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#prodi').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#prodi').append('<option value="' + response[i].id + '">' + response[i]
                                    .nama +
                                    '</option>');
                            }
                        }
                    }
                })
            } else {
                $('#prodi').find("option:not(:first-child)").html('');
                $.ajax({
                    url: "{{ url('list/prodi') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        idProdi: idProdi
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#prodi').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#prodi').append('<option value="' + response[i].id + '">' + response[i]
                                    .nama +
                                    '</option>');
                            }
                        }
                    }
                })
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#kurikulum-modul').addClass('active');
        })

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').removeClass('d-none');
                $('.' + key + '-error').text(value);
            });
        }

        function resetError() {
            resetErrorElement('nama');
            resetErrorElement('prodi');
            resetErrorElement('tahun');
            resetErrorElement('tanggal_upload');
            resetErrorElement('jenis_dokumen');
            resetErrorElement('file');
        }

        function resetModal() {
            resetError();
            $('#form-tambah')[0].reset();
            $('#jenis_dokumen').val('').trigger('change');
        }

        function resetErrorElement(key) {
            $('.' + key + '-error').addClass('d-none');
        }

        $('.filter').change(function() {
            table.draw();
        })
    </script>
@endpush
