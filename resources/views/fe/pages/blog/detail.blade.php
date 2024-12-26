@extends('fe.layouts.main')

@push('title')
    {{ $blog->slug }}
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
        <div class="container position-relative">
            <h1>Blog Details</h1>
            <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Blog Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Blog Image" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $blog->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                        {{ $profile->company_name }}</li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                                            datetime="{{ $blog->created_at->format('yyyy-mm-dd') }}">{{ $blog->created_at->format('d F Y') }}</time>
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">

                                {!! $blog->content !!}
                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $blog->blogCategory->name }}</a></li>
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->
            </div>

            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                    {{-- <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget --> --}}

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            @foreach ($categories as $data)
                                <li><a href="#">{{ $data->name }}
                                        <span>({{ $data->blog_count }})</span>
                                    </a></li>
                            @endforeach
                        </ul>

                    </div><!--/Categories Widget -->

                    <!-- Recent Posts Widget 2 -->
                    <div class="recent-posts-widget-2 widget-item">

                        <h3 class="widget-title">Recent Posts</h3>
                        @foreach ($widgetBlog as $data)
                            <div class="post-item">
                                <h4><a href="{{ route('landing.blogDetail', $data->slug) }}">{{ $data->title }}</a></h4>
                                <time
                                    datetime="{{ $data->created_at->format('yyyy-mm-dd') }}">{{ $data->created_at->format('d F Y') }}</time>
                            </div><!-- End recent post item-->
                        @endforeach
                    </div><!--/Recent Posts Widget 2 -->
                </div>

            </div>

        </div>
    </div>
@endsection
