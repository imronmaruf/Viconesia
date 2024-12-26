<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon"
        href="{{ $profile->logo_path ? asset('storage/' . $profile->logo_path) : asset('default/logo.png') }}">


    <title>@stack('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('be/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('be/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('be/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('be/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('be/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />

    <!-- CSS via npm -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('css')
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>

    <script src="{{ asset('be/dist/js/demo-theme.min.js?1692870487') }}"></script>

    <div class="page">
        <!-- Sidebar -->
        @include('be.layouts.sidebar')
        <!-- Navbar -->
        @include('be.layouts.navbar')

        <div class="page-wrapper">
            <!-- Page header -->
            @stack('pageHeader')
            <!-- Page body -->
            @yield('content')
            @include('be.layouts.footer')
        </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('be/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    {{-- <script src="{{ asset('be/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('be/dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
    <script src="{{ asset('be/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script> --}}
    <script src="{{ asset('be/dist/libs/list.js/dist/list.min.js?1692870487') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('be/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('be/dist/js/demo.min.js?1692870487') }}" defer></script>
    @stack('js')

</body>

</html>
