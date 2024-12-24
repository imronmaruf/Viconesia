@extends('fe.layouts.main')

@push('title')
    Home
@endpush
@push('css')
    {{-- <style>
        .testimonial {
            text-align: center;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .testimonial:hover {
            transform: translateY(-5px);
        }

        .testimonial img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            object-fit: cover;
        }


        .testimonial .client-name {
            font-weight: bold;
            color: #333;
            margin: 10px 0 5px;
        }

        .testimonial .client-position {
            color: #666;
            font-size: 14px;
            display: block;
        }
    </style> --}}
@endpush

@section('content')
    <!--Hero Section -->
    @include('fe.pages.section.heroSection')
    <!-- Hero Section -->

    <!-- About Section -->
    {{-- <section id="about" class="about section">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="{{ asset('fe/assets/img/img_long_5.jpg') }}" alt="Image " class="img-fluid img-overlap"
                            data-aos="zoom-out">
                    </div>
                    <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-3">
                            <strong>About Us</strong>
                        </h2>
                        <h3 class="content-subtitle text-white opacity-50">{{ $dataProfile->company_name }}</h3>
                        <p class="opacity-50">
                            {{ $dataProfile->description }}
                        </p>

                        <div class="row my-1">
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                <i class="bi bi-cloud-rain me-4 display-6"></i>
                                <div>
                                    <h3 class="m-0 h5 text-white">{{ $profile->company_name }}</h3>
                                    <p class="text-white opacity-50">{{ $profile->description }}</p>
                                </div>
                            </div>
                        </div>

                        <p><a href="#" class="btn-cta ">Get in touch</a></p>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section --> --}}

    <!-- About 3 Section -->
    <section id="about" class="about section">
        <div class="content">

            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">
                    <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                        <img src="{{ asset($image && $image->image_path ? $image->image_path : 'fe/static/default-image.jpg') }}"
                            alt="Image" class="img-fluid">
                    </div>

                    <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4">{{ $profile->company_name }}</h2>
                        <p class="mb-4">
                            {{ $profile->description }}
                        </p>

                        <p><a href="{{ asset('storage/' . $profile->portfolio_file) }}" class="btn-cta"
                                target="__blank">Download COMPANY
                                PROFILE</a></p>

                    </div>
                </div>
            </div>
    </section><!-- /About 3 Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <p>Explore moments and memories captured from our journey. Each picture tells a unique story about Viconesia.
            </p>
        </div><!-- End Section Title -->

        <div class="services-carousel-wrap">
            <div class="container">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">

                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true,
                                "dynamicBullets": true
                            },
                            "navigation": {
                                "nextEl": ".js-custom-next",
                                "prevEl": ".js-custom-prev"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 40
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 40
                                }
                            }
                        }
                </script>
                    <button class="navigation-prev js-custom-prev">
                        <i class="bi bi-arrow-left-short"></i>
                    </button>
                    <button class="navigation-next js-custom-next">
                        <i class="bi bi-arrow-right-short"></i>
                    </button>
                    <div class="swiper-wrapper">
                        @foreach ($images as $image)
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-item-contents">
                                        <a href="#">
                                            <span class="service-item-category">{{ $image->title }}</span>
                                            <h2 class="service-item-title">Gallery {{ $profile->company_name }}</h2>
                                        </a>
                                    </div>
                                    <img src="{{ asset($image->image_path) }}" alt="Image" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section><!-- /Services 2 Section -->


    <section class="testimonials-12 testimonials section" id="testimonials">
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2>TESTIMONIALS</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="testimonial-wrap">
            <div class="container">
                <div class="row">
                    @foreach ($testimonials as $data)
                        <div class="col-md-6 mb-4 mb-md-4">
                            <div class="testimonial">
                                <img src="{{ $data->photo_path ? asset('storage/' . $data->photo_path) : asset('fe/assets/img/testimonials/testimonials-1.jpg') }}"
                                    alt="Testimonial author">
                                <blockquote>
                                    <p>
                                        “ {!! $data->testimonial !!} ”
                                    </p>
                                </blockquote>
                                <p class="client-name">{{ $data->name }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>


    <section id="testimonials-pagination" class="blog-pagination section">
        <div class="container">
            <div class="d-flex justify-content-center">
                <ul>
                    <!-- Tautan ke halaman sebelumnya -->
                    @if ($testimonials->onFirstPage())
                        <li class="disabled"><span><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li><a href="{{ $testimonials->previousPageUrl() }}#testimonials"><i
                                    class="bi bi-chevron-left"></i></a></li>
                    @endif

                    <!-- Tautan untuk semua halaman -->
                    @for ($i = 1; $i <= $testimonials->lastPage(); $i++)
                        @if ($i == $testimonials->currentPage())
                            <li><a href="#" class="active">{{ $i }}</a></li>
                        @else
                            <li><a href="{{ $testimonials->url($i) }}#testimonials">{{ $i }}</a></li>
                        @endif
                    @endfor

                    <!-- Tautan ke halaman berikutnya -->
                    @if ($testimonials->hasMorePages())
                        <li><a href="{{ $testimonials->nextPageUrl() }}#testimonials"><i
                                    class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>

    @if ($blogs->count() > 0)
        <section id="recent-posts" class="recent-posts section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Recent Posts</h2>
                <p>Get the latest updates and stories from Viconesia. Find articles that inspire and inform.
                </p>
            </div>

            <div class="container">
                <div class="row gy-5">
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-md-6">
                            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
                                <div class="post-img position-relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $blog->image_path) }}" class="img-fluid"
                                        alt="{{ $blog->title }}">
                                    <span class="post-date">{{ $blog->created_at->format('F d, Y') }}</span>
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{ $blog->title }}</h3>
                                    <div class="meta d-flex align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person"></i> <span
                                                class="ps-2">{{ $profile->company_name }}</span>
                                        </div>
                                        <span class="px-3 text-black-50">/</span>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder2"></i>
                                            <span class="ps-2">{{ $blog->blogCategory->name ?? 'Uncategorized' }}</span>
                                        </div>
                                    </div>
                                    <hr>

                                    <a href="{{ route('landing.blogDetail', $blog->slug) }}"
                                        class="readmore stretched-link">
                                        <span>Read More</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="blog-pagination" class="blog-pagination section">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul>
                        @if ($blogs->onFirstPage())
                            <li class="disabled"><a><i class="bi bi-chevron-left"></i></a></li>
                        @else
                            <li><a href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                        @endif

                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            @if ($page == $blogs->currentPage())
                                <li><a href="#" class="active">{{ $page }}</a></li>
                            @elseif ($page == 1 || $page == $blogs->lastPage() || abs($page - $blogs->currentPage()) <= 2)
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @elseif ($page == $blogs->currentPage() + 3 || $page == $blogs->currentPage() - 3)
                                <li>...</li>
                            @endif
                        @endforeach

                        @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                        @else
                            <li class="disabled"><a><i class="bi bi-chevron-right"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    @endif


    {{-- <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section light-background">

        <div class="content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3>Subscribe To Our Newsletter</h3>
                        <p class="opacity-50">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nesciunt, reprehenderit!
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <form action="forms/newsletter.php" class="form-subscribe php-email-form">
                            <div class="form-group d-flex align-items-stretch">
                                <input type="email" name="email" class="form-control h-100"
                                    placeholder="Enter your e-mail">
                                <input type="submit" class="btn btn-secondary px-4" value="Subcribe">
                            </div>
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">
                                Your subscription request has been sent. Thank you!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Call To Action Section --> --}}
@endsection
