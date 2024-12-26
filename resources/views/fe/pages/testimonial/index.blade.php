@extends('fe.layouts.main')

@push('title')
    Testimonial - {{ $profile->company_name }}
@endpush
@push('css')
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('fe/assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
            <h1>Testimonials</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Testimonials</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
    <section class="testimonials-12 testimonials section" id="testimonials">
        <!-- Section Title -->
        <div class="container section-title " data-aos="fade-up">
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

    <!-- Testimonials Section -->
    {{-- <section class="testimonials-12 testimonials section" id="testimonials">
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
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-3.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">Claire Anderson</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-4">
                        <div class="testimonial">
                            <img src="{{ asset('fe/assets/img/testimonials/testimonials-4.jpg') }}"
                                alt="Testimonial author">
                            <blockquote>
                                <p>
                                    “Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Provident deleniti iusto molestias, dolore vel fugiat
                                    ab placeat ea?”
                                </p>
                            </blockquote>
                            <p class="client-name">Dan Smith</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Testimonials Section --> --}}

    <!-- Call To Action Section -->
    {{-- <section id="call-to-action" class="call-to-action section light-background">

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
