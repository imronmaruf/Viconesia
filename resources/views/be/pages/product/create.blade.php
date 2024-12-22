@extends('be.layouts.main')

@push('title')
    Product
@endpush

@push('css')
    <style>
        .preview-image {
            max-width: 100%;
            max-height: 200px;
            margin-top: 10px;
        }

        .delete-btn-container {
            display: none;
        }

        .delete-btn-container.active {
            display: block;
        }
    </style>
@endpush

@push('pageHeader')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Tambah Product
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/product.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left icon"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <div class="container-xl mt-3">
        <form action="{{ route('be/product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="product-container">
                <div class="card duplicate-container mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Tambah Data Product</h3>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger delete-btn-container" onclick="deleteCard(this)">
                                <i class="ti ti-trash icon"></i> Hapus
                            </button>
                            <button type="button" class="btn btn-success" onclick="duplicateCard(this)">
                                <i class="ti ti-copy icon"></i> Duplikat
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Product</label>
                                    <input type="text" name="name[]"
                                        class="form-control @error('name.*') is-invalid @enderror"
                                        value="{{ old('name.0') }}" placeholder="Masukkan Nama Product">
                                    @error('name.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga Product</label>
                                    <input type="number" name="price[]" step="0.01"
                                        class="form-control @error('price.*') is-invalid @enderror"
                                        value="{{ old('price.0') }}" placeholder="Masukkan Harga Product">
                                    @error('price.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Marketplace</label>
                                    <input type="url" name="market_link[]"
                                        class="form-control @error('market_link.*') is-invalid @enderror"
                                        value="{{ old('market_link.0') }}" placeholder="Masukkan Link Marketplace">
                                    @error('market_link.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Product</label>
                                    <textarea name="description[]" class="form-control @error('description.*') is-invalid @enderror" rows="5"
                                        placeholder="Masukkan Deskripsi Product">{{ old('description.0') }}</textarea>
                                    @error('description.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Product</label>
                                    <input type="file" name="image_path[]"
                                        class="form-control @error('image_path.*') is-invalid @enderror"
                                        onchange="previewImage(this)">
                                    @error('image_path.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="image-preview-container mt-2">
                                        <img class="preview-image" src="" alt="Image Preview"
                                            style="display: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti ti-device-floppy icon"></i> Simpan Semua Data
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        function previewImage(input) {
            const previewContainer = input.closest('.card').querySelector('.image-preview-container');
            const previewImage = previewContainer.querySelector('.preview-image');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        }

        function duplicateCard(button) {
            const originalCard = button.closest('.card.duplicate-container');
            const duplicateCard = originalCard.cloneNode(true);

            duplicateCard.querySelectorAll('input, textarea').forEach(input => {
                input.value = '';
                input.classList.remove('is-invalid');
            });
            duplicateCard.querySelectorAll('.invalid-feedback').forEach(feedback => feedback.remove());
            duplicateCard.querySelector('.delete-btn-container').classList.add('active');

            document.getElementById('product-container').appendChild(duplicateCard);
        }

        function deleteCard(button) {
            button.closest('.card.duplicate-container').remove();
        }
    </script>
@endpush
