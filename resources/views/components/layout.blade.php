<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My Laravel App')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes countUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .stat-number {
            animation: countUp 1s ease-out forwards;
        }
    </style>

    <!-- Custom Styles (if needed) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('styles') {{-- Allows additional styles to be added from child views --}}
</head>

<body class="">
    @yield('content', 'nothing here yet')
    @stack('scripts')
</body>

</html>
