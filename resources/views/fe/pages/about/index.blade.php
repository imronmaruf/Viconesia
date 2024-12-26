@extends('fe.layouts.main')

@push('title')
    About - {{ $profile->company_name }}
@endpush
@push('css')
    <style>
        .img-fluid {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
            display: block;
            /* Menghindari margin tambahan */
            margin: 0 auto;
            /* Memusatkan gambar */
        }
    </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('fe/assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
            <h1>About</h1>
            <p>Welcome to Viconesia! Get to know us better.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">About</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">

        <div class="container">
            <div class="row gy-4 justify-content-between align-items-center">
                {{-- <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                    <img src="{{ asset($image->image_path) }}" alt="Image" class="img-fluid">
                </div> --}}
                <div class="col-lg-12 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="content-title mb-4">{{ $profile->company_name ? $profile->company_name : '' }}</h2>
                    <p class="mb-4">
                        {{ $profile->description ? $profile->description : '' }}
                    </p>

                    <p><a href="{{ asset('storage/' . $profile->portfolio_file) }}" class="btn-cta-dw"
                            target="__blank">Download COMPANY
                            PROFILE</a></p>
                    </p>
                </div>
            </div>
        </div>
    </section><!-- /About 3 Section -->

    <!-- Team Section -->
    <section class="team-15 team section" id="team">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Our Team</h2>
            <p>We are proud to introduce the talented individuals behind Viconesia's success.</p>
        </div><!-- End Section Title -->

        <div class="content">
            <div class="container">

                {{-- <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="person">
                                <figure>
                                    <img src="{{ asset('storage/' . $team->photo_path) }}" alt="Image" class="img-fluid"
                                        style="max-height: 500px; max-width: 500px;">
                                    <div class="social">
                                        <a href="#"><span class="bi bi-facebook"></span></a>
                                        <a href="#"><span class="bi bi-twitter-x"></span></a>
                                        <a href="#"><span class="bi bi-linkedin"></span></a>
                                    </div>
                                </figure>
                                <div class="person-contents">
                                    <h3>{{ $team->name }}</h3>
                                    <span class="position">{{ $team->position }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                {{-- 
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-0 shadow-sm"> <!-- Card tanpa border -->
                                <div class="card-body text-center">
                                    <div class="person">
                                        <figure>
                                            <img src="{{ asset('storage/' . $team->photo_path) }}" alt="Image"
                                                style="max-height: 500px; max-width: 500px;"
                                                class="img-fluid rounded-2 team-photo">
                                            <h3 class="mt-3">{{ $team->name }}</h3>
                                            <span class="text-muted">{{ $team->position }}</span>
                                            <div class="mt-2">
                                                <a href="#" class="text-decoration-none mx-1"><span
                                                        class="bi bi-facebook"></span></a>
                                                <a href="#" class="text-decoration-none mx-1"><span
                                                        class="bi bi-twitter-x"></span></a>
                                                <a href="#" class="text-decoration-none mx-1"><span
                                                        class="bi bi-linkedin"></span></a>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                <div class="row">
                    @foreach ($teams as $team)
                        <!-- Team Member 1 -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-0 shadow">
                                <div class="person">
                                    <figure>
                                        <img src="{{ asset('storage/' . $team->photo_path) }}" class="card-img-top"
                                            alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success mb-0">{{ $team->name }}</h5>
                                            <div class="card-text text-black-50">{{ $team->position }}</div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

    </section><!-- /Team Section -->

    {{-- <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>SERVICES</h2>
            <p>Providing Fresh Produce Every Single Day</p>
        </div><!-- End Section Title -->
        <div class="content">
            <div class="container">
                <div class="row g-0">
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <span class="number">01</span>
                                <div class="service-item-icon">
                                    <img src="{{ asset('storage/' . $team->photo_path) }}" class="card-img-top"
                                        alt="...">
                                </div>
                                <div class="service-item-content">
                                    <h3 class="service-heading">{{ $team->name }}</h3>
                                    <p>
                                        {{ $team->position }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section><!-- /Services Section --> --}}
@endsection
