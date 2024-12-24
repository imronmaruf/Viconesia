@extends('fe.layouts.main')

@push('title')
    Blog
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('fe/assets/img/page-title-bg.webp') }});">
        <div class="container position-relative">
            <h1>Blog</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>

        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts-2" class="blog-posts-2 section">
        <div class="container">
            <!-- Search Widget -->
            <div class="search-widget widget-item mt-0">
                <form action="{{ route('landing.blogIndex') }}" method="GET">
                    <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div>

            <div class="row gy-4">
                @forelse ($blogs as $blog)
                    <div class="col-lg-4">
                        <article class="position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $blog->image_path) }}" class="img-fluid"
                                    alt="{{ $blog->title }}">
                            </div>

                            <div class="meta d-flex align-items-end">
                                <span class="post-date">
                                    <span>{{ $blog->created_at->format('d') }}</span>{{ $blog->created_at->format('F') }}
                                </span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span class="ps-2">{{ $profile->company_name ?? 'Viconesia' }}</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">{{ $blog->blogCategory->name ?? 'Uncategorized' }}</span>
                                </div>
                            </div>

                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">{{ $blog->title }}</h3>
                                {{-- <a href="#" class="readmore stretched-link"> --}}
                                <a href="{{ route('landing.blogDetail', $blog->slug) }}" class="readmore stretched-link">
                                    <span>Read More</span><i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div><!-- End post list item -->
                @empty
                    <div class="col-12">
                        <p class="text-center">No posts available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section><!-- /Blog Posts Section -->



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
