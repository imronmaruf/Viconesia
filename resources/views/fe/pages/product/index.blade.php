@extends('fe.layouts.main')

@push('title')
    Home
@endpush

@push('css')
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('fe/assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
            <h1>Product</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Product</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Product Section -->
    <section id="recent-posts" class="recent-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Product</h2>
            <p>Providing Fresh Produce Every Single Day</p>
        </div><!-- End Section Title -->

        <div class="container">
            @forelse ($products as $data)
                <div class="col-xl-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="post-item position-relative h-100">
                        <div class="post-img position-relative overflow-hidden">
                            <a href="{{ asset('storage/' . $data->image_path) }}" class="glightbox"
                                data-gallery="product-gallery">
                                <img src="{{ asset('storage/' . $data->image_path) }}" class="img-fluid"
                                    alt="{{ $data->name }}">
                            </a>
                            <span class="post-date">Rp. {{ number_format($data->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="post-content d-flex flex-column">
                            <h3 class="post-title">{{ $data->name }}</h3>
                            <span>{{ $data->description }}</span>
                            <hr>
                            <a href="{{ $data->market_link }}" class="readmore stretched-link" target="__blank">
                                <span>Product Link</span><i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <p class="text-center">No product available.</p>
                </div>
            @endforelse
        </div>
    </section><!-- /Services Section -->
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lightbox = GLightbox({
                selector: '.glightbox'
            });
        });
    </script>
@endpush
