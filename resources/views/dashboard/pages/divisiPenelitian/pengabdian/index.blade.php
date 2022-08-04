@extends('dashboard.layouts.main')

@section('title')
    Pengabdian
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
            <a href="#">Divisi Penelitian</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Pengabdian</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Pengabdian</div>
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
                                    'label' => 'Skema Pengabdian',
                                    'id' => 'skema_filter',
                                    'name' => 'skema_filter',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value=""></option>
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
                                    <option value=""></option>
                                    <option value="Semua">Semua</option>
                                    @foreach ($daftarSumberDana as $sumberDana)
                                        <option value="{{ $sumberDana->id }}">{{ $sumberDana->nama }}</option>
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
                                        'th' => [
                                            'No',
                                            'Nama',
                                            'Ketua',
                                            'Anggota',
                                            'Tahun',
                                            'Besar Dana',
                                            'Skema',
                                            'Sumber Dana',
                                            'Jenis Dokumen',
                                            'File',
                                            'Aksi',
                                        ],
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
                        <h5 class="modal-title" id="modal-tambah-title">Tambah Pengabdian</h5>
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
                                    'label' => 'Nama Pengabdian',
                                    'placeholder' => 'Nama Pengabdian',
                                    'name' => 'nama',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.textArea',
                                [
                                    'id' => 'ketua',
                                    'type' => 'text',
                                    'label' => 'Ketua Peneliti',
                                    'placeholder' => 'Ketua Peneliti',
                                    'name' => 'ketua',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.textArea',
                                [
                                    'id' => 'anggota',
                                    'type' => 'text',
                                    'label' => 'Anggota Peneliti',
                                    'placeholder' => 'Anggota Peneliti',
                                    'name' => 'anggota',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'tahun',
                                    'type' => 'text',
                                    'label' => 'Tahun Pengabdian',
                                    'placeholder' => 'Tahun Pengabdian',
                                    'name' => 'tahun',
                                    'class' => 'numerik',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'besar_dana',
                                    'type' => 'text',
                                    'label' => 'Besar Dana',
                                    'placeholder' => 'Besar Dana',
                                    'name' => 'besar_dana',
                                    'class' => 'uang',
                                    'required' => true,
                                ])
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Skema Pengabdian',
                                    'id' => 'skema',
                                    'name' => 'skema',
                                    'class' => 'select2',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                    'required' => true,
                                ])
                                @slot('options')
                                @endslot
                            @endcomponent
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.select',
                                [
                                    'label' => 'Sumber Dana',
                                    'id' => 'sumber_dana',
                                    'name' => 'sumber_dana',
                                    'class' => 'select2',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                    'required' => true,
                                ])
                                @slot('options')
                                @endslot
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
                                    'required' => true,
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
                                    'id' => 'file_proposal',
                                    'type' => 'file',
                                    'label' => 'File Proposal',
                                    'placeholder' => 'File Proposal',
                                    'name' => 'file_proposal',
                                    'required' => true,
                                ])
                            @endcomponent
                            <label for="" class="text-muted notif-file">Kosongkan File Jika Tidak Ingin
                                Mengubah file</label>
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'file_laporan',
                                    'type' => 'file',
                                    'label' => 'File Laporan',
                                    'placeholder' => 'File Laporan',
                                    'name' => 'file_laporan',
                                    'required' => true,
                                ])
                            @endcomponent
                            <label for="" class="text-muted notif-file">Kosongkan File Jika Tidak Ingin
                                Mengubah file</label>
                        </div>
                        <div class="col">
                            @component('dashboard.components.formElements.input',
                                [
                                    'id' => 'file_luaran',
                                    'type' => 'file',
                                    'label' => 'File Luaran',
                                    'placeholder' => 'File Luaran',
                                    'name' => 'file_luaran',
                                    'required' => true,
                                ])
                            @endcomponent
                            <label for="" class="text-muted notif-file">Kosongkan File Jika Tidak Ingin
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
        var idSkema = '';
        var idSumberDana = '';
        var aksiTambah = 'tambah';
        $('#btn-tambah').click(function() {
            resetModal();
            idSkema = '';
            idSumberDana = '';
            getSkema();
            getSumberDana();
            aksiTambah = 'tambah';
            $('#modal-tambah').modal('show');
            $('#modal-tambah-title').html('Tambah Pengabdian');
            $('.notif-file').css("display", "none");
        })

        $(document).on('click', '#btn-edit', function() {
            let id = $(this).val();
            $('.notif-file').css("display", "block");
            idEdit = id;
            resetModal();

            $.ajax({
                url: "{{ url('divisi-penelitian/pengabdian') }}" + '/' + id + '/edit',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    aksiTambah = 'ubah';
                    $('#modal-tambah').modal('show');
                    $('#modal-tambah-title').html('Ubah Pengabdian');
                    $('#nama').val(response.nama);
                    $('#ketua').val(response.ketua);
                    $('#anggota').val(response.anggota);
                    $('#tahun').val(response.tahun);
                    $('#besar_dana').val(response.besar_dana).trigger('input');
                    $('#jenis_dokumen').val(response.jenis_dokumen).trigger('change');
                    idSkema = response.skema_pengabdian_id;
                    idSumberDana = response.sumber_dana_id;
                    getSkema();
                    setTimeout(
                        function() {
                            $('#skema').val(response.skema_pengabdian_id).trigger('change');
                        }, 500
                    );
                    getSumberDana();
                    setTimeout(
                        function() {
                            $('#sumber_dana').val(response.sumber_dana_id).trigger('change');
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
                    url: "{{ url('divisi-penelitian/pengabdian') }}",
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
                    url: "{{ url('divisi-penelitian/pengabdian') }}" + '/' + idEdit,
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
                        url: "{{ url('divisi-penelitian/pengabdian') }}" + '/' + id,
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
                url: "{{ url('divisi-penelitian/pengabdian') }}",
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
                    data: 'jenis_dokumen',
                    name: 'jenis_dokumen',
                    className: 'text-center',
                },
                {
                    data: 'file',
                    name: 'file',
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

        function getSkema() {
            $('#skema').html('');
            if (aksiTambah == "tambah") {
                $.ajax({
                    url: "{{ url('list/skema-pengabdian') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#skema').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#skema').append('<option value="' + response[i].id + '">' + response[i]
                                    .nama +
                                    '</option>');
                            }
                        }
                    }
                })
            } else {
                $.ajax({
                    url: "{{ url('list/skema-pengabdian') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        idSkema: idSkema
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#skema').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#skema').append('<option value="' + response[i].id + '">' + response[i]
                                    .nama +
                                    '</option>');
                            }
                        }
                    }
                })
            }
        }

        function getSumberDana() {
            $('#sumber_dana').html('');
            if (aksiTambah == "tambah") {
                $.ajax({
                    url: "{{ url('list/sumber-dana') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#sumber_dana').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#sumber_dana').append('<option value="' + response[i].id + '">' + response[i]
                                    .nama +
                                    '</option>');
                            }
                        }
                    }
                })
            } else {
                $.ajax({
                    url: "{{ url('list/sumber-dana') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        idSumberDana: idSumberDana
                    },
                    success: function(response) {
                        if (response.length > 0) {
                            $('#sumber_dana').append("<option></option>");
                            for (var i = 0; i < response.length; i++) {
                                $('#sumber_dana').append('<option value="' + response[i].id + '">' + response[i]
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
            $('#penelitian-pengabdian').addClass('active');
        })

        function printErrorMsg(msg) {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').removeClass('d-none');
                $('.' + key + '-error').text(value);
            });
        }

        function resetError() {
            resetErrorElement('nama');
            resetErrorElement('ketua');
            resetErrorElement('anggota');
            resetErrorElement('tahun');
            resetErrorElement('besar_dana');
            resetErrorElement('skema');
            resetErrorElement('sumber_dana');
            resetErrorElement('jenis_dokumen');
            resetErrorElement('file_proposal');
            resetErrorElement('file_laporan');
            resetErrorElement('file_luaran');
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
