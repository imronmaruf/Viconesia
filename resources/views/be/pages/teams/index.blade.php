@extends('be.layouts.main')

@push('title')
    Tim
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
                        Data Tim
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modalAdd">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Tim
                        </button>
                        <button class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modalAdd"
                            aria-label="Create new user">
                            <i class="ti ti-plus"></i>
                        </button>
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
                                <th>Nama</th>
                                <th>Posisi/Jabatan</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTeams as $data)
                                <tr>
                                    <td class="col-no">{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->position }}</td>
                                    <td class="text-center">
                                        @if ($data->photo_path)
                                            <div style="border: 1px solid #9e9e9e; display: inline-block;" class="rounded">
                                                <img src="{{ asset('storage/' . $data->photo_path) }}" alt="Teams Image"
                                                    style="max-width: 180px; max-height: 120px; object-fit: cover;"
                                                    class="rounded">
                                            </div>
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="col-action">
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('be/teams.destroy', $data->id) }}" method="POST"
                                                id="deleteForm{{ $data->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger"
                                                    onclick="confirmDelete('{{ $data->id }}')" data-bs-toggle="tooltip"
                                                    title="Hapus Data">
                                                    <i class="ti ti-trash"></i>
                                                </button>

                                            </form>

                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit{{ $data->id }}">
                                                <i class="ti ti-ballpen"></i>
                                            </button>
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
    @include('be.pages.teams.modal')
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
