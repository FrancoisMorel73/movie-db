<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movie DB</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="antialiased bg-gray-100 text-gray-900 flex flex-col min-h-screen">

    @include('partials.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

    @vite('resources/js/app.js')
    <script src="{{ asset('js/burger-menu.js') }}"></script>
    <script src="{{ asset('js/favorites.js') }}"></script>
    @if (request()->routeIs('movie.show'))
        <script src="{{ asset('js/reviews.js') }}"></script>
    @endif
</body>

</html>
