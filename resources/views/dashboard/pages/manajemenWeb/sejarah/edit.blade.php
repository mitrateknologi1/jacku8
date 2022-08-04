@extends('dashboard.layouts.main')

@section('title')
    Sejarah UPSP
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
            <a href="#">Sejarah UPSP</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Ubah Sejarah UPSP</div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data" id="form-tambah">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                @component('dashboard.components.formElements.ckEditor',
                                    [
                                        'label' => 'Isi Sejarah',
                                        'id' => 'isi',
                                        'name' => 'isi',
                                        'class' => 'ckeditor',
                                        'wajib' => '<sup class="text-danger">*</sup>',
                                        'value' => $sejarah->isi,
                                    ])
                                @endcomponent
                                <div class="text-right mt-3">
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
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#form-tambah').submit(function(e) {
            e.preventDefault();
            submitCkEditor();
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
                        url: "{{ url('manajemen-web/sejarah' . '/' . $sejarah->id) }}",
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
                                        "{{ url('manajemen-web/sejarah') }}";
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

        function submitCkEditor() {
            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].updateElement();
            }
        }

        const printErrorMsg = (msg) => {
            $.each(msg, function(key, value) {
                $('.' + key + '-error').text(value);
            });
        }

        $(document).ready(function() {
            $('#manajemen-web-sejarah').addClass('active');
        })
    </script>
@endpush
