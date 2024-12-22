@extends('be.layouts.main')

@push('title')
    Blog Post
@endpush

@push('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .preview-image {
            max-width: auto;
            max-height: 190px;
            object-fit: cover;
            margin-top: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 5px;
        }

        .ql-editor {
            min-height: 200px;
        }

        .ql-container {
            font-size: 16px;
        }
    </style>
@endpush

@push('pageHeader')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Blog
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/blog.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left icon"></i>
                            Kembali
                        </a>
                        <a href="{{ route('be/blog.index') }}" class="btn btn-secondary d-sm-none btn-icon">
                            <i class="ti ti-arrow-left icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush


@section('content')
    <div class="container-xl mt-3">
        <div class="card">
            <div class="card-status-top bg-green"></div>
            <div class="card-header">
                <h3 class="card-title">Tambah Blog</h3>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('be/blog.store') }}" method="POST" enctype="multipart/form-data" id="blogForm">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    placeholder="Masukkan Judul">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ old('slug') }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label required">Konten Blog</label>
                                <div id="editor" style="height: 200px;">{!! old('content') !!}</div>
                                <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                                @error('content')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" id="imageInput" name="image_path"
                                    class="form-control @error('image_path') is-invalid @enderror"
                                    accept="image/jpeg,image/png,image/jpg">
                                @error('image_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img id="imagePreview" class="preview-image d-none" src="#" alt="Preview Image">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Kategori Blog</label>
                                <select class="form-select @error('blog_category_id') is-invalid @enderror"
                                    name="blog_category_id">
                                    <option value="">--- Pilih Kategori ---</option>
                                    @foreach ($dataCategory as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('blog_category_id') == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('blog_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label required">Status Blog</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">--- Pilih Status ---</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-checklist me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        // Handle slug
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^a-z0-9\s]/g, '')
                .replace(/\s+/g, '-')
                .trim();
            document.getElementById('slug').value = slug;
        });

        // Handle image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
            }
        });
    </script>
@endpush
