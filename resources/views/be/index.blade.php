@extends('be.layouts.main')

@push('title')
    Dashboard
@endpush

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card card-md mb-3">
                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-mood-smile">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.8 10.946a1 1 0 0 0 -1.414 .014a2.5 2.5 0 0 1 -3.572 0a1 1 0 0 0 -1.428 1.4a4.5 4.5 0 0 0 6.428 0a1 1 0 0 0 -.014 -1.414zm-6.19 -5.286l-.127 .007a1 1 0 0 0 .117 1.993l.127 -.007a1 1 0 0 0 -.117 -1.993zm6 0l-.127 .007a1 1 0 0 0 .117 1.993l.127 -.007a1 1 0 0 0 -.117 -1.993z" />
                            </svg>
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                                <path d="M10 10l.01 0" />
                                <path d="M14 10l.01 0" />
                                <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                            </svg> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1"> 🌴 Selamat Datang di Dashboard {{ $profile->company_name }}! 🌟</h3>
                                <div class="markdown text-secondary">
                                    Halo, {{ Auth::user()->name }}! 👋 Selamat datang di pusat pengelolaan website
                                    <a href="https://viconesia.com" target="_blank" rel="noopener">Viconesia.com</a>,

                                    {{-- <span class="text-decoration-underline"><strong>Viconesia.com</strong></span> --}}
                                    Kelola informasi produk, konten halaman website, dan kelola konten perusahaan untuk
                                    meningkatkan kepercayaan konsumen.

                                    🚀 Semoga sukses dan selamat bekerja! 💼

                                </div>
                                {{-- <div class="mt-3">
                                    <a href="https://tabler-icons.io" class="btn btn-primary" target="_blank"
                                        rel="noopener">Download icons</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                <i class="ti ti-shopping-cart icon" width="24"></i>

                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $productCount }} Product
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                <i class="ti ti-users-group icon" width="24"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $teamsCount }} Teams
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                <div class="ti ti-news icon"></div>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ $blogCount }} Blog
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
