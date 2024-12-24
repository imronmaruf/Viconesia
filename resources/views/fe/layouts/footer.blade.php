<footer id="footer" class="footer dark-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <!-- About Section -->
                <div class="col-lg-8 col-md-8 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center mb-3">
                        <span class="sitename">{{ $profile->company_name }}</span>
                    </a>
                    <div class="footer-contact">
                        <p>{{ $profile->address }}</p>
                        <p class="mt-3"><strong>Phone:</strong> +{{ $profile->phone_number }}</p>
                        <p><strong>Email:</strong> {{ $profile->email }}</p>
                    </div>
                </div>

                <!-- Useful Links Section -->
                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Useful Links</h4>
                    <ul class="list-unstyled d-flex flex-wrap">
                        <li class="w-50"><a href="/">Home</a></li>
                        <li class="w-50"><a href="/about">About us</a></li>
                        <li class="w-50"><a href="/product">Product</a></li>
                        <li class="w-50"><a href="/testimonial">Testimonial</a></li>
                        <li class="w-50"><a href="/blog">Blog</a></li>
                        <li class="w-50"><a href="/contact">Contact</a></li>
                    </ul>
                </div>




                {{-- <!-- Services Section -->
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div> --}}
            </div>

        </div>
    </div>

    <div class="copyright text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div>
                    © Copyright <strong><span>{{ $profile->company_name }}</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                        href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                <a href="https://wa.me/{{ $profile->whatsapp_link }}" target="__blank"><i
                        class="bi bi-whatsapp"></i></a>
                <a href="https://www.instagram.com/{{ $profile->instagram_link }}" target="__blank"><i
                        class="bi bi-instagram"></i></a>
            </div>

        </div>
    </div>

</footer>
