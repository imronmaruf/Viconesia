@extends('be.layouts.main')

@push('title')
    Blog Post
@endpush

@push('css')
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
                <h3 class="card-title">{{ $dataBlog->title }}</h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table mb-0 table-bordered table-striped">
                            <tbody>
                                {{-- <tr>
                                    <th scope="row" class="w-25">Judul Berita</th>
                                    <td class="w-75">{{ $dataBlog->title }}</td>
                                </tr> --}}
                                <tr>
                                    <th scope="row" class="w-25">Slug</th>
                                    <td class="w-75">{{ $dataBlog->slug }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="w-25">Status</th>
                                    <td class="w-75">
                                        <span
                                            class="badge text-white {{ $dataBlog->status === 'published' ? 'bg-green' : 'bg-yellow' }}">
                                            {{ $dataBlog->status === 'published' ? 'Published' : 'Draft' }}
                                        </span>

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="w-25">Kategori</th>
                                    <td class="w-75">{{ $dataCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="w-25">Konten</th>
                                    <td class="w-75">{!! $dataBlog->content !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="w-25">Gambar</th>
                                    <td class="w-75">
                                        <div style="border: 1px solid #9e9e9e; display: inline-block;" class="rounded">
                                            <img src="{{ asset('storage/' . $dataBlog->image_path) }}" alt="Blog Image"
                                                style="max-width: auto; max-height: 250px; object-fit: cover;"
                                                class="rounded">
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
