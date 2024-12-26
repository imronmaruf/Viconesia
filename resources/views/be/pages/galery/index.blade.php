@extends('be.layouts.main')

@push('title')
    Galery
@endpush

@push('css')
    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .img-thumbnail {
            max-width: 200px;
            height: auto;
        }
    </style>
@endpush

@push('pageHeader')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Data Galeri
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('be/galery.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus icon"></i>
                            Tambah Galeri
                        </a>

                        <a href="{{ route('be/galery.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus icon"></i>
                        </a>

                        <button id="delete-selected" class="btn btn-danger d-sm-none btn-icon">
                            <i class="ti ti-trash icon"></i>
                        </button>

                        <button id="delete-selected" class="btn btn-danger d-none d-sm-inline-block">
                            <i class="ti ti-trash icon"></i>
                            Hapus Terpilih
                        </button>
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
            <div class="card-body">
                @if ($galeries->count())
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th width="50">
                                            <input type="checkbox" id="select-all" class="form-check-input">
                                        </th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galeries as $gallery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <input type="checkbox" name="selected[]" value="{{ $gallery->id }}"
                                                    class="form-check-input gallery-checkbox">
                                            </td>
                                            <td>
                                                <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}"
                                                    class="img-thumbnail">
                                            </td>
                                            <td>{{ $gallery->title }}</td>
                                            <td>
                                                <div class="btn-list">
                                                    <a href="{{ route('be/galery.edit', $gallery->id) }}"
                                                        class="btn btn-warning btn-md">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                @else
                    <div class="text-center py-4">
                        <div class="alert alert-warning">
                            Data Galeri belum ditambahkan
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Select all functionality
        document.getElementById('select-all')?.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.gallery-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Delete selected functionality
        document.getElementById('delete-selected')?.addEventListener('click', function() {
            const selected = document.querySelectorAll('input[name="selected[]"]:checked');

            if (selected.length === 0) {
                Swal2.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Pilih minimal satu galeri untuk dihapus',
                    showConfirmButton: true
                });
                return;
            }

            Swal2.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus galeri yang dipilih?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm');
                    const selectedIds = Array.from(selected).map(cb => cb.value).join(',');
                    form.action = `{{ route('be/galery.destroy', '') }}/${selectedIds}`;
                    form.submit();
                }
            });
        });

        // Success and error messages
        window.addEventListener('load', function() {
            @if (session('success'))
                Swal2.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: "{{ session('success') }}",
                    timer: 1500,
                    showConfirmButton: false
                });
            @endif

            @if ($errors->any())
                Swal2.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    html: "{!! implode('<br>', $errors->all()) !!}",
                    showConfirmButton: true
                });
            @endif
        });
    </script>
@endpush
