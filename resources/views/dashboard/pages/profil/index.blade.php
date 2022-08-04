@extends('dashboard.layouts.main')

@section('title')
    Akun
@endsection

@push('style')
    <style>
        .preview-img {
            max-height: 256px;
            height: auto;
            width: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 5px;
        }

        #img_contain {
            border-radius: 5px;
            /*  border:1px solid grey;*/
            width: auto;
        }

        .alert {
            text-align: center;
        }

        .loading {
            animation: blinkingText ease 2.5s infinite;
        }

        @keyframes blinkingText {
            0% {
                color: #000;
            }

            50% {
                color: #transparent;
            }

            99% {
                color: transparent;
            }

            100% {
                color: #000;
            }
        }

        .custom-file-label {
            cursor: pointer;
        }
    </style>
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
            <a href="#">Dashboard</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Profil</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Profil</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form id="form-tambah" action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-4">
                                    <div class="col-12">
                                        <small class="form-text text-muted mb-2">Kosongkan password / foto jika tidak
                                            ingin merubah
                                            datanya</small>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Username',
                                                'type' => 'text',
                                                'id' => 'username',
                                                'name' => 'username',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan Username',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Password',
                                                'type' => 'text',
                                                'id' => 'password',
                                                'name' => 'password',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan Password',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Nama Lengkap',
                                                'type' => 'text',
                                                'id' => 'nama',
                                                'name' => 'nama',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan Nama Lengkap',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'NIDN',
                                                'type' => 'text',
                                                'id' => 'nidn',
                                                'name' => 'nidn',
                                                'class' => 'numerik',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan NIDN',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'NIP',
                                                'type' => 'text',
                                                'id' => 'nip',
                                                'name' => 'nip',
                                                'class' => 'numerik',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan NIP',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'label' => 'Tempat Lahir',
                                                'type' => 'text',
                                                'id' => 'tempat_lahir',
                                                'name' => 'tempat_lahir',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                                'placeholder' => 'Masukkan Tempat Lahir',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        @component('dashboard.components.formElements.input',
                                            [
                                                'id' => 'tanggal_lahir',
                                                'type' => 'text',
                                                'label' => 'Tanggal Lahir (Hari-Bulan-Tahun, Contoh : 01-12-2022)',
                                                'placeholder' => 'Hari-Bulan-Tahun',
                                                'name' => 'tanggal_lahir',
                                                'class' => 'tanggal',
                                                'required' => true,
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Golongan Pangkat',
                                                'id' => 'golongan',
                                                'name' => 'golongan',
                                                'class' => 'select2',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                @foreach ($daftarGolongan as $golongan)
                                                    <option value="{{ $golongan->id }}">{{ $golongan->nama }}</option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Jabatan Fungsional',
                                                'id' => 'jabatan_fungsional',
                                                'name' => 'jabatan_fungsional',
                                                'class' => 'select2',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                @foreach ($daftarJabatanFungsional as $jabatanFungsional)
                                                    <option value="{{ $jabatanFungsional->id }}">{{ $jabatanFungsional->nama }}
                                                    </option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                        @component('dashboard.components.formElements.select',
                                            [
                                                'label' => 'Program Studi',
                                                'id' => 'prodi',
                                                'name' => 'prodi',
                                                'class' => 'select2',
                                                'wajib' => '<sup class="text-danger">*</sup>',
                                            ])
                                            @slot('options')
                                                @foreach ($daftarProdi as $prodi)
                                                    <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                                                @endforeach
                                            @endslot
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-12 col-lg-12 mt-3">
                                        <label for="errorInput">Foto<sup class="text-danger">*</sup></label>
                                        <div id='img_contain'><img id="preview-foto" align='middle'
                                                src="{{ asset('assets/dashboard/img/profil-empty.png') }}" alt=""
                                                title='' class="preview-img" /></div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="foto" class="imgInp custom-file-input"
                                                    aria-describedby="inputGroupFileAddon01" name="foto">
                                                <label id="label-foto" class="custom-file-label" for="foto">Tambah
                                                    Foto</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Ukuran Foto Harus Dibawah 1 Mb</small>
                                        <span class="text-danger error-text foto-error"></span>
                                    </div>
                                    <div class="col-12 text-right">
                                        @component('dashboard.components.buttons.submit',
                                            [
                                                'label' => 'Simpan',
                                            ])
                                        @endcomponent
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#username').val('{{ $user->username }}');
            $('#nama').val('{{ $user->profil->nama }}');
            $('#nidn').val('{{ $user->profil->nidn }}');
            $('#nip').val('{{ $user->profil->nip }}');
            $('#tempat_lahir').val('{{ $user->profil->tempat_lahir }}');
            $('#tanggal_lahir').val('{{ $user->profil->tanggal_lahir }}');
            $('#golongan').val('{{ $user->profil->golongan_id }}').trigger('change');
            $('#jabatan_fungsional').val('{{ $user->profil->jabatan_fungsional_id }}').trigger('change');
            $('#prodi').val('{{ $user->profil->prodi_id }}').trigger('change');
            $('#preview-foto').attr('src', "{{ Storage::url('/akun/foto/' . $user->profil->foto) }}");
        })
    </script>

    <script>
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            swal({
                title: 'Apakah Anda Yakin ?',
                icon: 'warning',
                text: "Apakah Anda Yakin ?",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Ya',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-danger'
                    }
                }
            }).then((Update) => {
                if (Update) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('profil' . '/' . $user->id) }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('/logout') }}";
                                })
                            } else {
                                swal("Periksa Kembali Data Anda", {
                                    buttons: false,
                                    timer: 1500,
                                    icon: "warning",
                                });
                                printErrorMsg(response.error);
                            }
                        },
                        error: function(response) {
                            swal("Gagal", "Terjadi Kesalahan", {
                                icon: "error",
                                buttons: false,
                                timer: 1000,
                            });
                            alert(response.responseJSON.message)
                        },
                    });
                }
            });
        });

        $(function() {
            $('.modal').modal({
                backdrop: 'static',
                keyboard: false
            })
        })

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }
    </script>

    <script>
        $("#foto").change(function(event) {
            RecurFadeIn();
            readURLFoto(this);
        });
        $("#foto").on('click', function(event) {
            RecurFadeIn();
        });

        function readURLFoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#foto").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#preview-foto').attr('src', e.target.result);
                    $('#preview-foto').hide();
                    $('#preview-foto').fadeIn(500);
                    $('#label-foto').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }

        function RecurFadeIn() {
            FadeInAlert("Wait for it...");
        }

        function FadeInAlert(text) {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }

        $("#tanda-tangan").change(function(event) {
            RecurFadeIn();
            readURLTandaTangan(this);
        });
        $("#tanda-tangan").on('click', function(event) {
            RecurFadeIn();
        });

        function readURLTandaTangan(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#tanda-tangan").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#preview-tanda-tangan').attr('src', e.target.result);
                    $('#preview-tanda-tangan').hide();
                    $('#preview-tanda-tangan').fadeIn(500);
                    $('#label-tanda-tangan').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }

        function RecurFadeIn() {
            FadeInAlert("Wait for it...");
        }

        function FadeInAlert(text) {
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }
    </script>
@endpush
