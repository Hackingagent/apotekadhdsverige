<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaCare - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #2a4365;
            --secondary: #3182ce;
            --accent: #e53e3e;
            --dark: #1a202c;
            --light: #f7fafc;
            --success: #38a169;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;
        }

        .bg-primary {
            background-color: var(--primary) !important;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
        }

        /* Add more custom styles as needed */
    </style>
</head>
<body>
    @include('layouts.partials.header')

    <main class="py-4">
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @include('layouts.partials.scripts')

    @stack('scripts')
</body>
</html>