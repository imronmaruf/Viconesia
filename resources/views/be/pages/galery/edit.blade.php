@extends('be.layouts.main')

@push('title')
    Edit Galeri
@endpush

@section('content')
    <div class="container-xl mt-3">
        <div class="card">
            <div class="card-status-top bg-green"></div>
            <div class="card-header">
                <h3 class="card-title">Edit Galeri</h3>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/galery.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left icon"></i>
                            Tambah Galeri
                        </a>

                        <a href="{{ route('be/galery.index') }}" class="btn btn-secondary d-sm-none btn-icon">
                            <i class="ti ti-arrow-left icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('be/galery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $gallery->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div>
                            <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}"
                                style="max-width: 200px">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Baru</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.querySelector('input[name="image"]').addEventListener('change', function(e) {
            let reader = new FileReader();
            reader.onload = function(event) {
                document.querySelector('img').src = event.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Pesan sukses
            let successMessage = '{{ session('success') }}';
            if (successMessage) {
                Swal2.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: successMessage,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    location.reload(); // Reload page after success message
                });
            }

            // Pesan error
            @if ($errors->any())
                Swal2.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan",
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    showConfirmButton: true,
                });
            @endif
        });
    </script>
@endpush
