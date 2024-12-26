@extends('be.layouts.main')

@push('title')
    Blog Post
@endpush

@push('css')
    <style>
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            margin-top: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 5px;
        }
    </style>
@endpush

@push('pageHeader')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Data Kategori Blog
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/blog.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus icon"></i>
                            Tambah Blog
                        </a>
                        <a href="{{ route('be/blog.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <div class="container-xl mt-4">
        <div class="card">
            <div class="card-body">

                <div id="table-default" class="table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                {{-- <th style="width: 37%;">Konten</th> --}}
                                <th>Gambar</th>
                                <th style="width: 3%;">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBlog as $data)
                                <tr>
                                    <td class="col-no">{{ $loop->iteration }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->slug }}</td>
                                    {{-- <td>{!! $data->content !!}</td> --}}
                                    {{-- <td>{!! Str::limit(strip_tags($data->content), 200, '...') !!}</td> --}}

                                    <td class="text-center">
                                        @if ($data->image_path)
                                            <div style="border: 1px solid #9e9e9e; display: inline-block;" class="rounded">
                                                <img src="{{ asset('storage/' . $data->image_path) }}" alt="Blog Image"
                                                    style="max-width: 180px; max-height: 120px; object-fit: cover;"
                                                    class="rounded">
                                            </div>
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge text-white {{ $data->status === 'published' ? 'bg-green' : 'bg-yellow' }}">
                                            {{ $data->status === 'published' ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>

                                    {{-- <td>{{ $data->status }}</td> --}}
                                    <td class="col-action">
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('be/blog.destroy', $data->id) }}" method="POST"
                                                id="deleteForm{{ $data->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete('{{ $data->id }}')" data-bs-toggle="tooltip"
                                                    title="Hapus Data">
                                                    <i class="ti ti-trash"></i>
                                                </button>

                                            </form>

                                            <a href="{{ route('be/blog.edit', $data->id) }}" type="button"
                                                class="btn btn-warning">
                                                <i class="ti ti-ballpen"></i>
                                            </a>

                                            <a href="{{ route('be/blog.show', $data->id) }}" type="button"
                                                class="btn btn-azure">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function confirmDelete(id) {
            let form = document.getElementById('deleteForm' + id);
            Swal2.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus secara permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

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
