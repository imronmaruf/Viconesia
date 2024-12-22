<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <!-- Navbar Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <h1 class="navbar-brand navbar-brand-autodark">
            <div class="d-flex align-items-center justify-content-center">
                <a href="/dashboard" class="d-flex align-items-center text-decoration-none">
                    @if (optional($profile)->logo_path)
                        <span class="avatar avatar-sm rounded-3 me-2"
                            style="background-image: url('{{ asset('storage/' . $profile->logo_path) }}'); width: 50px; height: 50px; background-size: cover;">
                        </span>
                        <span class="mb-0">{{ $profile->company_name }}</span>
                    @else
                        <span class="mb-0">Dashboard</span>
                    @endif
                </a>
            </div>

        </h1>

        <!-- Mobile Navigation -->
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ isset($profile) && $profile->logo_path ? asset('storage/' . $profile->logo_path) : '' }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-secondary">{{ Auth::user()->role }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('be/account/setting.index') }}" class="dropdown-item">Settings</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation -->
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('dashboard.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-home icon"></i>
                        </span>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>

                <!-- Landing Page Header -->
                <li class="nav-item">
                    <div class="nav-link">
                        <span class="nav-link-title">Landing Page</span>
                    </div>
                </li>

                <!-- Content Dropdown -->
                <li
                    class="nav-item {{ Route::is('be/hero.*') || Route::is('be/teams.index') || Route::is('be/testimonials.index') ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-content" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button"
                        aria-expanded="{{ Route::is('be/hero.*') || Route::is('be/teams.index') || Route::is('be/testimonials.index') ? 'true' : 'false' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-device-desktop-analytics icon"></i>
                        </span>
                        <span class="nav-link-title">Konten</span>
                    </a>

                    <div
                        class="dropdown-menu {{ Route::is('be/hero.*') || Route::is('be/teams.index') || Route::is('be/testimonials.index') ? 'show' : '' }}">
                        <a class="dropdown-item {{ Route::is('be/hero.*') ? 'active' : '' }}"
                            href="{{ route('be/hero.index') }}">Hero</a>
                        <a class="dropdown-item {{ Route::is('be/teams.index') ? 'active' : '' }}"
                            href="{{ route('be/teams.index') }}">Teams</a>
                        <a class="dropdown-item {{ Route::is('be/testimonials.index') ? 'active' : '' }}"
                            href="{{ route('be/testimonials.index') }}">Testimonials</a>
                    </div>
                </li>

                <!-- Blog Dropdown -->
                <li
                    class="nav-item {{ Route::is('be/blog/category.index') || Route::is('be/blog.*') ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-blog" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button"
                        aria-expanded="{{ Route::is('be/blog/category.index') || Route::is('be/blog.*') ? 'true' : 'false' }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-news icon"></i>
                        </span>
                        <span class="nav-link-title">Blog</span>
                    </a>
                    <div
                        class="dropdown-menu  {{ Route::is('be/blog/category.index') || Route::is('be/blog.*') ? 'show' : '' }}">
                        <a class="dropdown-item {{ Route::is('be/blog/category.index') ? 'active' : '' }}"
                            href="{{ route('be/blog/category.index') }}">Kategori</a>
                        <a class="dropdown-item {{ Route::is('be/blog.index') ? 'active' : '' }}"
                            href="{{ route('be/blog.index') }}">Blog Post</a>
                    </div>
                </li>

                <!-- Products -->
                <li class="nav-item {{ Route::is('be/product.index') ? 'active' : '' }}">
                    <a class="nav-link {{ Route::is('be/product.index') ? 'active' : '' }} "
                        href="{{ route('be/product.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block ">
                            <i class="ti ti-shopping-cart icon"></i>
                        </span>
                        <span class="nav-link-title ">Produk</span>
                    </a>
                </li>

                <!-- Master Menu Header -->
                <div
                    class="nav-link {{ Route::is('be/profile.*') || Route::is('be/account/setting.*') || Route::is('be/user.*') ? 'active' : '' }}">
                    <span class="nav-link-title">Master Menu</span>
                </div>

                <!-- Company Profile -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('be/profile.*') ? 'active' : '' }}"
                        href="{{ route('be/profile.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-buildings icon"></i>
                        </span>
                        <span class="nav-link-title">Profil Perusahaan</span>
                    </a>
                </li>

                <!-- Account Settings -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('be/account/setting.*') ? 'active' : '' }}"
                        href="{{ route('be/account/setting.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-lock-cog icon"></i>
                        </span>
                        <span class="nav-link-title">Pengaturan Akun</span>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('be/user.*') ? 'active' : '' }}"
                        href="{{ route('be/user.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="ti ti-users icon"></i>
                        </span>
                        <span class="nav-link-title">Data Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
