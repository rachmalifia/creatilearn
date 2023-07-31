<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- Ajax --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- Font Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;600;700;900&family=Poppins:wght@200;400;600;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Creatilearn</title>
</head>
<body class="bg-base-200">
    {{-- Facebook like plugin  --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="qn3inig1"></script>

    @if(auth()->check())
        @include('layouts.navbar')
    @endif

    <section>
        @yield('greeting')
    </section>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
    {{-- Local JS --}}
    <script src="/js/script.js"></script>
</body>
</html>