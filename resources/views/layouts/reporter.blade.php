<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/o logo.png') }}">
    <title>Echo Communes | Reporter</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('extra-styles')
</head>
<body>

    @php
        $newsCategories = \App\Models\Category::all();
    @endphp

    @include('includes.reporters.sidebar')
    <main>
        @yield('content')
    </main>

    <script src="{{ asset('assets/scripts/auth/base.js') }}"></script>
    @yield('extra-scripts')
</body>
</html>
