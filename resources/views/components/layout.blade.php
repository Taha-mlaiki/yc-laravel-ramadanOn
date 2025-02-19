<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles (if needed) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    @stack('styles') {{-- Allows additional styles to be added from child views --}}
</head>
<body class="">
    @yield('content',"nothing here yet")
    @stack('scripts') 
</body>
</html>
