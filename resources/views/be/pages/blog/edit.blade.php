@extends('be.layouts.main')

@push('title')
    Edit Blog Post
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

@section('content')
    <div class="container-xl mt-3">
        <div class="card">
            <div class="card-status-top bg-green"></div>
            <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Action menuju route update -->
            <form action="{{ route('be/blog.update', $dataBlog->id) }}" method="POST" enctype="multipart/form-data"
                id="blogForm">
                @csrf
                @method('PUT') <!-- Method untuk update -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $dataBlog->title) }}" placeholder="Masukkan Judul">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                {{-- <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ old('slug', $dataBlog->slug) }}" disabled> --}}

                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ old('slug', $dataBlog->slug) }}" readonly>
                            </div>
                        </div>




                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label required">Konten Blog</label>
                                <div id="editor" style="height: 200px;">{!! old('content', $dataBlog->content) !!}</div>
                                <input type="hidden" id="content" name="content"
                                    value="{{ old('content', $dataBlog->content) }}">
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
                                <img id="imagePreview" class="preview-image {{ $dataBlog->image_path ? '' : 'd-none' }}"
                                    src="{{ $dataBlog->image_path ? asset('storage/' . $dataBlog->image_path) : '#' }}"
                                    alt="Preview Image">
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
                                            {{ old('blog_category_id', $dataBlog->blog_category_id) == $data->id ? 'selected' : '' }}>
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
                                    <option value="published"
                                        {{ old('status', $dataBlog->status) == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="draft"
                                        {{ old('status', $dataBlog->status) == 'draft' ? 'selected' : '' }}>
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
                        <i class="ti ti-checklist"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'font': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image'],
                    ['clean']
                ]
            },
            placeholder: 'Tulis konten blog disini...',
        });

        // Handle form submission
        document.getElementById('blogForm').addEventListener('submit', function(e) {
            var content = document.getElementById('content');
            content.value = quill.root.innerHTML;
        });

        document.getElementById('title').addEventListener('input', function() {
            var title = this.value;
            var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
            var slugInput = document.getElementById('slug');
            slugInput.value = slug; // Mengisi input slug dengan nilai yang baru
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

        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = '{{ session('success') }}';
            if (successMessage) {
                Swal2.fire({
                    icon: "success",
                    title: "Success!",
                    text: successMessage,
                    showConfirmButton: false,
                    timer: 1500
                });
            }


            @if ($errors->any())
                Swal2.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan",
                    html: `
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    `,
                    showConfirmButton: true,
                }).then(() => {
                    window.location.reload();
                });
            @endif
        });
    </script>
@endpush
