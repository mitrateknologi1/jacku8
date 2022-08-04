@extends('dashboard.layouts.main')

@section('title')
    Struktur Organisasi
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
            <a href="#">Manajemen Web</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Struktur Organisasi</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Struktur Organisasi</div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" id="form-tambah">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">
                                <div class="col-12">
                                    @component('dashboard.components.formElements.input',
                                        [
                                            'label' => 'Jabatan',
                                            'type' => 'text',
                                            'id' => 'jabatan',
                                            'name' => 'jabatan',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'placeholder' => 'Masukkan Jabatan',
                                            'value' => $strukturOrganisasi->jabatan,
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-12">
                                    @component('dashboard.components.formElements.input',
                                        [
                                            'label' => 'Nama',
                                            'type' => 'text',
                                            'id' => 'nama',
                                            'name' => 'nama',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'placeholder' => 'Masukkan Nama',
                                            'value' => $strukturOrganisasi->nama,
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-12">
                                    @component('dashboard.components.formElements.input',
                                        [
                                            'label' => 'Pekerjaan',
                                            'type' => 'text',
                                            'id' => 'pekerjaan',
                                            'name' => 'pekerjaan',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'placeholder' => 'Masukkan Pekerjaan',
                                            'value' => $strukturOrganisasi->pekerjaan,
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-12">
                                    @component('dashboard.components.formElements.textArea',
                                        [
                                            'id' => 'pendidikan',
                                            'type' => 'text',
                                            'label' => 'Pendidikan',
                                            'placeholder' => 'Pendidikan',
                                            'name' => 'pendidikan',
                                            'required' => true,
                                            'value' => $strukturOrganisasi->pendidikan,
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-12">
                                    @component('dashboard.components.formElements.input',
                                        [
                                            'label' => 'Email',
                                            'type' => 'text',
                                            'id' => 'email',
                                            'name' => 'email',
                                            'wajib' => '<sup class="text-danger">*</sup>',
                                            'placeholder' => 'Masukkan Email',
                                            'value' => $strukturOrganisasi->email,
                                        ])
                                    @endcomponent
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="col-sm-12 col-lg-12 mt-3">
                                    <label for="errorInput">Foto<sup class="text-danger">*</sup></label>
                                    <div id='img_contain'><img id="preview-foto" align='middle'
                                            src="{{ Storage::url('/struktur_organisasi' . '/' . $strukturOrganisasi->foto) }}"
                                            alt="" title='' class="preview-img img-fluid" /></div>
                                    <div class="input-group mt-3">
                                        <div class="custom-file">
                                            <input type="file" id="foto" class="imgInp custom-file-input"
                                                aria-describedby="inputGroupFileAddon01" name="foto">
                                            <label id="label-foto" class="custom-file-label" for="foto">Tambah
                                                Foto</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Ukuran Foto Harus Dibawah 1 Mb</small>
                                    <small class="form-text text-muted">Kosongkan Foto Jika Tidak Ingin Mengupdate
                                        Foto</small>
                                    <span class="text-danger error-text foto-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-right mt-3">
                                    @component('dashboard.components.buttons.submit',
                                        [
                                            'label' => 'Simpan',
                                        ])
                                    @endcomponent
                                </div>
                            </div>

                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script')
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
                        url: "{{ url('manajemen-web/struktur-organisasi' . '/' . $strukturOrganisasi->id) }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status == 'success') {
                                swal("Berhasil", "Data Berhasil Disimpan", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000,
                                }).then(function() {
                                    window.location.href =
                                        "{{ url('manajemen-web/struktur-organisasi') }}";
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

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        $(document).ready(function() {
            $('#manajemen-web-tupoksi').addClass('active');
        })

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
    </script>
@endpush
