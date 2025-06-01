<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lumbung Pangan Indonesia</title>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Styles -->
    <style>
        [x-cloak] {
    display: none !important;
}
        .border_custom {
            border-radius: 600px 400px 600px 400px;
            -webkit-border-radius: 600px 400px 600px 400px;
            -moz-border-radius: 600px 400px 600px 180px;
        }
    </style>

</head>

<body id="body" class="bg-gray-100 font-jost">
    <!-- Navbar -->
    @if (!Request::is('cart'))
        <!-- Cek jika URL bukan 'cart' -->
        <x-navbar></x-navbar>
    @endif

    <!-- Hero Section -->
    <main class="relative">
        <div id="dark-body"
            class="transition-all duration-150 ease-in-out w-screen h-screen hidden start-0 bg-slate-800 opacity-45 z-40">
        </div>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @if (!Request::is('cart'))
        <x-footer></x-footer>
    @endif

</body>
<script src="{{ asset('js/handleModalProduct.js') }}"></script>

</html>
