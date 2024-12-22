@foreach ($dataProduct as $index => $data)
    <div class="modal modal-blur fade" id="modalEdit{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('be/product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Product</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $data->name) }}" placeholder="Masukkan Nama Product">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Harga Product</label>
                                    <input type="number" name="price" step="0.01"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{ old('price', $data->price) }}" placeholder="Masukkan Harga Product">
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Link Marketplace</label>
                                    <input type="url" name="market_link"
                                        class="form-control @error('market_link') is-invalid @enderror"
                                        value="{{ old('market_link', $data->market_link) }}"
                                        placeholder="Masukkan Link Marketplace">
                                    @error('market_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Product</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"
                                        placeholder="Masukkan Deskripsi Product">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gambar Product</label>
                                    <input type="file" name="image_path"
                                        class="form-control @error('image_path') is-invalid @enderror"
                                        onchange="previewImage(this, 'previewImage{{ $data->id }}')">
                                    @error('image_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <div class="image-preview-container mt-2">
                                        <img id="previewImage{{ $data->id }}" class="preview-image"
                                            src="{{ $data->image_path ? asset('storage/' . $data->image_path) : '' }}"
                                            alt="Image Preview"
                                            style="{{ $data->image_path ? 'display: block;' : 'display: none;' }} max-height: 200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto">
                            <i class="ti ti-checklist icon"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
