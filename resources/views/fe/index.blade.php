@extends('fe.layouts.main')

@push('title')
    Home
@endpush
@push('css')
@endpush

@section('content')
    <!--Hero Section -->
    @include('fe.pages.section.heroSection')
    <!-- Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

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
                        {{-- <h3 class="content-subtitle text-white opacity-50">{{ $dataProfile->company_name }}</h3>
                        <p class="opacity-50">
                            {{ $dataProfile->description }}
                        </p> --}}

                        <div class="row my-1">
                            <div class="col-lg-12 d-flex align-items-start mb-4">
                                {{-- <i class="bi bi-cloud-rain me-4 display-6"></i> --}}
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
    </section><!-- /About Section -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">
        <div class="content">

            <div class="container">
                <div class="row gy-4 justify-content-between align-items-center">
                    <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
                        <img src="{{ asset('fe/assets/img/img_sq_1.jpg') }}" alt="Image" class="img-fluid">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn">
                            <span class="play"><i class="bi bi-play-fill"></i></span>
                        </a>
                    </div>
                    <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="content-title mb-4">Plants Make Life Better</h2>
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim
                            necessitatibus placeat, atque qui voluptatem velit explicabo vitae
                            repellendus architecto provident nisi ullam minus asperiores commodi!
                            Tenetur, repellat aliquam nihil illo.
                        </p>
                        <ul class="list-unstyled list-check">
                            <li>Lorem ipsum dolor sit amet</li>
                            <li>Velit explicabo vitae repellendu</li>
                            <li>Repellat aliquam nihil illo</li>
                        </ul>

                        <p><a href="#" class="btn-cta">Get in touch</a></p>
                    </div>
                </div>
            </div>
    </section><!-- /About 3 Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section dark-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur</p>
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
                "clickable": true
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
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Planting</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_1.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Mulching</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_3.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Watering</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_8.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Fertilizing</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_4.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Harvesting</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_5.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Mowing</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_6.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-item">
                                <div class="service-item-contents">
                                    <a href="#">
                                        <span class="service-item-category">We do</span>
                                        <h2 class="service-item-title">Seeding Plants</h2>
                                    </a>
                                </div>
                                <img src="{{ asset('fe/assets/img/img_sq_8.jpg') }}" alt="Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section><!-- /Services 2 Section -->

    <!-- Testimonials Section -->
    <section class="testimonials-12 testimonials section" id="testimonials">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>TESTIMONIALS</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="testimonial-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-4">
                        <div class="testimonial">
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-1.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">James Smith</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-4">
                        <div class="testimonial">
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-2.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">Kate Smith</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-4">
                        <div class="testimonial">
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-1.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">James Smith</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-4">
                        <div class="testimonial">
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-2.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">Kate Smith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Testimonials Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Posts</h2>
            <p>Necessitatibus eius consequatur</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset('fe/assets/img/blog/blog-1.jpg') }}" class="img-fluid" alt="">
                            <span class="post-date">December 12</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset('fe/assets/img/blog/blog-2.jpg') }}" class="img-fluid" alt="">
                            <span class="post-date">July 17</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->
                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="{{ asset('fe/assets/img/blog/blog-2.jpg') }}" class="img-fluid" alt="">
                            <span class="post-date">July 17</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->
            </div>

        </div>

    </section><!-- /Recent Posts Section -->

    <!-- Call To Action Section -->
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
    </section><!-- /Call To Action Section -->
@endsection
