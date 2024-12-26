@extends('fe.layouts.main')

@push('title')
    Contact - {{ $profile->company_name }}
@endpush
@push('css')
    <style>
        iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
    </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('fe/assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
            <h1>Contact</h1>

            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="mb-5">
            {!! $profile->maps !!}
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade">

            <div class="row gy-5 gx-lg-5 d-flex justify-content-center align-items-center ">

                <div class="col-lg-10">

                    <div class="info">
                        <h3>Get in touch</h3>
                        <p>We’re here to help! Feel free to reach out with any questions or inquiries. Let’s connect and
                            make things happen.</p>

                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>{{ $profile->address ? $profile->address : '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p>{{ $profile->email ? $profile->email : '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Phone:</h4>
                                <p>{{ $profile->phone_number ? $profile->phone_number : '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-whatsapp flex-shrink-0"></i>
                            <div>
                                <h4>WhatsApp:</h4>
                                <p>{{ $profile->whatsapp_link ? $profile->whatsapp_link : '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-whatsapp flex-shrink-0"></i>
                            <div>
                                <h4>Instagram Username:</h4>
                                <p>{{ $profile->instagram_link ? $profile->instagram_link : '' }}</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                {{-- <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" placeholder="Message" required=""></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div><!-- End Contact Form --> --}}

            </div>

        </div>

    </section><!-- /Contact Section -->

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
