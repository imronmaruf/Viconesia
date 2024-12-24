<header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Cek apakah ada gambar logo -->
            @if ($profile->logo_path)
                <img src="{{ asset('storage/' . $profile->logo_path) }}" alt="{{ $profile->company_name }}">
                <h1 class="sitename">{{ $profile->company_name }}</h1>
            @else
                <h1 class="sitename">{{ $profile->company_name ? $profile->company_name : 'Viconesia' }}</h1>
            @endif
        </a>


        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="{{ Route::is('landing.index') ? 'active' : '' }}">Home</a></li>
                <li><a href="/about" class="{{ Route::is('landing.aboutIndex') ? 'active' : '' }}">About Us</a></li>
                <li><a href="/product" class="{{ Route::is('landing.productIndex') ? 'active' : '' }}">Product</a></li>
                <li><a href="/testimonial"
                        class="{{ Route::is('landing.testimonialIndex') ? 'active' : '' }}">Testimonials</a>
                </li>
                <li><a href="/blog"
                        class="{{ Route::is('landing.blogIndex') || Route::is('landing.blogDetail') ? 'active' : '' }}">Blog</a>
                </li>
                <li><a href="/contact" class="{{ Route::is('landing.contactIndex') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
