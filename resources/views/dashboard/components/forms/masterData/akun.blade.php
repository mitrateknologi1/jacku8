<form id="{{ $form_id }}" action="#" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($method) && $method == 'PUT')
        @method('PUT')
    @endif
    <div class="row g-4">
        @if (isset($method) && $method == 'PUT')
            <div class="col-12">
                <small class="form-text text-muted mb-2">Kosongkan password / foto jika tidak ingin merubah
                    datanya</small>
            </div>
        @endif

        <div class="col-sm-12 col-lg-4">
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
        <div class="col-sm-12 col-lg-4">
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
            @component('dashboard.components.formElements.select',
                [
                    'label' => 'Role',
                    'id' => 'role',
                    'name' => 'role',
                    'class' => 'select2',
                    'wajib' => '<sup class="text-danger">*</sup>',
                ])
                @slot('options')
                    <option value="admin">Admin</option>
                    <option value="kurikulum">Kurikulum</option>
                    <option value="penelitian">Penelitian</option>
                    <option value="kerja_sama">Kerja Sama</option>
                    <option value="dosen">Dosen</option>
                    </option>
                @endslot
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
                        <option value="{{ $jabatanFungsional->id }}">{{ $jabatanFungsional->nama }}</option>
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
                    src="{{ asset('assets/dashboard/img/profil-empty.png') }}" alt="" title=''
                    class="preview-img" /></div>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="foto" class="imgInp custom-file-input"
                        aria-describedby="inputGroupFileAddon01" name="foto">
                    <label id="label-foto" class="custom-file-label" for="foto">Tambah Foto</label>
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


@push('script')
    @if (isset($method) && $method == 'PUT')
        <script>
            $(document).ready(function() {});
        </script>
    @endif
    <script>
        $('#{{ $form_id }}').submit(function(e) {
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
                        url: "{{ $action }}",
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
                                        "{{ $back_url }}";
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
