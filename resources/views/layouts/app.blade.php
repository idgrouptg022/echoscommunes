@php
    $categories = \App\Models\Category::orderBy('name')->get();
@endphp


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Echos des communes est le premier site d'informations entièrement dédié à l'actualité des communes du Togo">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="ECHOS DES COMMUNES">
    <meta property="og:description" content="Echos des communes est le premier site d'informations entièrement dédié à l'actualité des communes du Togo...">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:url" content="https://echosdescommunes.tg">

    <meta name="twitter:card" content="ECHOS DES COMMUNES">
    <meta name="twitter:title" content="ECHOS DES COMMUNES">
    <meta name="twitter:description" content="Echos des communes est le premier site d'informations entièrement dédié à l'actualité des communes du Togo...">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="twitter:url" content="https://echosdescommunes.tg">

    <link rel="icon" href="{{ asset('assets/images/o logo.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/styles/guests/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <title>Echo Des Communes</title>
    @yield('extra-style')
</head>
<body>

    @include('includes.guests.navbar')
    <main class="main">@yield('content')</main>
    @include('includes.guests.footer')

    <script src="{{ asset('assets/scripts/guests/navbar.js') }}"></script>
    @yield('extra-script')
</body>
</html>
