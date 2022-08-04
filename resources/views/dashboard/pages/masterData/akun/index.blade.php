@extends('dashboard.layouts.main')

@section('title')
    Akun
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
            <a href="#">Master Data</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Akun</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Akun</div>
                        <div class="card-tools">
                            @component('dashboard.components.buttons.add',
                                [
                                    'id' => 'btn-tambah',
                                    'class' => '',
                                    'url' => url('/master-data/akun/create'),
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
                                    'label' => 'Role',
                                    'id' => 'role_filter',
                                    'name' => 'role_filter',
                                    'class' => 'select2 filter',
                                    'wajib' => '<sup class="text-danger">*</sup>',
                                ])
                                @slot('options')
                                    <option value="admin" selected>Admin</option>
                                    <option value="kurikulum">Kurikulum</option>
                                    <option value="penelitian">Penelitian</option>
                                    <option value="kerja_sama">Kerja Sama</option>
                                    <option value="dosen">Dosen</option>
                                    </option>
                                @endslot
                            @endcomponent
                        </div>
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card fieldset">
                                @component('dashboard.components.dataTables.index',
                                    [
                                        'id' => 'table-data',
                                        'th' => ['No', 'Nama', 'NIDN / NIP', 'Prodi', 'Role', 'Aksi'],
                                    ])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-lihat">
        <form method="POST" id="form-tambah">
            @csrf
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-tambah-title">Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Nama',
                                'id' => 'nama',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'NIDN / NIP',
                                'id' => 'nidn',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Tempat, Tanggal Lahir',
                                'id' => 'tempatTanggalLahir',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Program Studi',
                                'id' => 'prodi',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Pangkat Golongan',
                                'id' => 'pangkatGolongan',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Jabatan Fungsioanl',
                                'id' => 'jabatanFungsional',
                            ])
                        @endcomponent
                        @component('dashboard.components.widgets.detail',
                            [
                                'judul' => 'Username',
                                'id' => 'username',
                            ])
                        @endcomponent
                        <label class="form-label my-2 fw-bold">Foto</label><br>
                        <img src="{{ asset('/assets/dashboard/img/profil-empty.png') }}" alt="Foto Profil" class="img-fluid"
                            width="150px" id="foto">
                    </div>
                    <div class="modal-footer">
                        @component('dashboard.components.buttons.close')
                        @endcomponent
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).on('click', '#btn-lihat', function() {
            let id = $(this).val();
            $.ajax({
                url: "{{ url('master-data/akun') }}" + '/' + id,
                type: 'GET',
                success: function(response) {
                    $('#nama').html(response.nama);
                    $('#nidn').html(response.nidn);
                    $('#tempatTanggalLahir').html(response.tempat_tanggal_lahir);
                    $('#pangkatGolongan').html(response.pangkat_golongan);
                    $('#jabatanFungsional').html(response.jabatan_fungsional);
                    $('#username').html(response.username);
                    $('#prodi').html(response.prodi);
                    $('#foto').attr("src", response.foto);
                    $('#modal-lihat').modal('show');
                }
            })
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
                        url: "{{ url('master-data/akun') }}" + '/' + id,
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
                url: "{{ url('master-data/akun') }}",
                data: function(d) {
                    d.role = $('#role_filter').val();
                    d.prodi = $('#prodi_filter').val();
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
                    className: 'text-center',
                },
                {
                    data: 'nidn',
                    name: 'nidn',
                    className: 'text-center',
                },
                {
                    data: 'prodi',
                    name: 'prodi',
                    className: 'text-center',
                },
                {
                    data: 'role',
                    name: 'role',
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
            $('#master-akun').addClass('active');
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
