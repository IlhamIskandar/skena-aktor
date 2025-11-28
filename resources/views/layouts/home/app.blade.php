<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Skena Aktor - Komunitas Acting Terkemuka</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="{{ asset('css/home-style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/navbar-style.css') }}" rel="stylesheet" type="text/css" >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/program.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daftar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/benefit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">


    <title>{{ config('app.name', 'appname') }}</title>

</head>
<body>
    <!-- Page Heading -->
        {{-- @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset --}}
    <!-- Navigation Bar -->
    @include('components.home-nav')


        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

    <!-- Footer Section -->
    @include('components.home-footer')
    <!-- Footer Bottom -->


    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            once: true,
            offset: 100
        });
    </script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
