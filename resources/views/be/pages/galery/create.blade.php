@extends('be.layouts.main')
@push('title')
    Tambah Galeri
@endpush

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 150px;
            padding: 20px;
            cursor: pointer;
        }

        .dropzone .dz-message {
            text-align: center;
            margin: 2em 0;
        }
    </style>
@endpush

@section('content')
    <div class="container-xl mt-3">
        <div class="card">
            <div class="card-status-top bg-green"></div>
            <div class="card-header">
                <h3 class="card-title">Tambah Galeri</h3>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/galery.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left icon"></i>
                            Kembali
                        </a>

                        <a href="{{ route('be/galery.index') }}" class="btn btn-secondary d-sm-none btn-icon">
                            <i class="ti ti-arrow-left icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Judul Galeri</label>
                    <input type="text" id="title" class="form-control" required>
                </div>

                <form action="{{ route('be/galery.store') }}" method="POST" class="dropzone" id="myDropzone">
                    @csrf
                    <input type="hidden" name="title" id="hidden-title">
                    <div class="dz-message needsclick">
                        <i class="h1 text-muted ti ti-upload"></i>
                        <h3>Drop File Foto Disini atau Klik untuk Upload.</h3>
                        <span class="text-muted">Maximum file size 2MB</span>
                    </div>
                </form>

                <div class="text-end mt-3">
                    <button type="button" id="submit-all" class="btn btn-primary">
                        <i class="ti ti-checklist icon me-2"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        let myDropzone = new Dropzone("#myDropzone", {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 2,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            init: function() {
                var dz = this;

                // Ketika tombol submit diklik
                document.getElementById("submit-all").addEventListener("click", function(e) {
                    e.preventDefault();

                    const title = document.getElementById("title").value;
                    if (!title) {
                        Swal2.fire({
                            icon: "error",
                            title: "Error",
                            text: "Judul harus diisi!"
                        });
                        return;
                    }

                    if (dz.getQueuedFiles().length === 0) {
                        Swal2.fire({
                            icon: "error",
                            title: "Error",
                            text: "Pilih foto terlebih dahulu!"
                        });
                        return;
                    }

                    document.getElementById("hidden-title").value = title;
                    dz.processQueue();
                });

                // Ketika upload berhasil
                this.on("successmultiple", function(files, response) {
                    Swal2.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Galeri berhasil ditambahkan",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "{{ route('be/galery.index') }}";
                    });
                });

                // Ketika terjadi error
                this.on("errormultiple", function(files, response) {
                    Swal2.fire({
                        icon: "error",
                        title: "Error!",
                        text: "Terjadi kesalahan saat upload"
                    });
                });
            }
        });
    </script>
@endpush
