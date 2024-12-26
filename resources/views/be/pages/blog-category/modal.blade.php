<!-- Modal Tambah Kategori -->
<div class="modal modal-blur fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('be/blog/category.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" disabled
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <i class="ti ti-checklist icon me-2"></i>
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
@foreach ($dataCategories as $data)
    <div class="modal modal-blur fade" id="modalEdit{{ $data->id }}" tabindex="-1" role="dialog"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('be/blog/category.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name{{ $data->id }}" class="form-label">Nama Kategori</label>
                                    <input type="text" id="name{{ $data->id }}" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $data->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="slug{{ $data->id }}" class="form-label">Slug</label>
                                    <input type="text" id="slug{{ $data->id }}" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        value="{{ old('slug', $data->slug) }}" disabled>
                                    <!-- Value dengan data lama -->
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary ms-auto gap-1">
                            <i class="ti ti-checklist icon me-2"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<script>
    document.getElementById('name').addEventListener('input', function() {
        let nameInput = this.value;
        let slugInput = document.getElementById('slug');

        // Mengubah nama menjadi slug (huruf kecil, spasi menjadi dash)
        let slug = nameInput.toLowerCase()
            .replace(/[^a-z0-9\s]/g, '') // Hapus karakter spesial
            .replace(/\s+/g, '-') // Ganti spasi dengan '-'
            .trim();

        // Set value dari input slug dan disable
        slugInput.value = slug;
        slugInput.setAttribute('disabled', true);
    });

    // Untuk setiap modal edit berdasarkan ID unik
    @foreach ($dataCategories as $data)
        document.getElementById('name{{ $data->id }}').addEventListener('input', function() {
            let nameInput = this.value;
            let slugInput = document.getElementById('slug{{ $data->id }}');

            // Mengubah nama menjadi slug (huruf kecil, spasi menjadi dash)
            let slug = nameInput.toLowerCase()
                .replace(/[^a-z0-9\s]/g, '') // Hapus karakter spesial
                .replace(/\s+/g, '-') // Ganti spasi dengan '-'
                .trim();

            // Set value dari input slug dan disable
            slugInput.value = slug;
            slugInput.setAttribute('disabled', true);
        });
    @endforeach
</script>
