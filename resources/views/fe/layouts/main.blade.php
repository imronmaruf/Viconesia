<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@stack('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('fe/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('fe/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('fe/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fe/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('fe/assets/css/main.css') }}" rel="stylesheet">
    @stack('css')

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body class="index-page">
    @include('fe.layouts.navbar')

    <main class="main">
        @yield('content')
    </main>

    @include('fe.layouts.footer')

    @include('fe.layouts.back-to-top')

    <!-- Vendor JS Files -->
    <script src="{{ asset('fe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('fe/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('fe/assets/js/main.js') }}"></script>

    @stack('js')
</body>

</html>
