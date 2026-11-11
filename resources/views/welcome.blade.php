<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Vendor CSS / Custom Styles -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body class="antialiased">

        <!-- Your Portfolio Main Content Structure -->
        <div id="app">
            <!-- Header / Hero Section -->
            <header>
                <!-- Add your portfolio navigation and hero elements here -->
            </header>

            <!-- Main Content Area -->
            <main>
                <!-- Example of loading an image from public/assets/img/ -->
                <!-- <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Picture"> -->
            </main>
        </div>

        <!-- Vendor JS / Custom Scripts -->
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>