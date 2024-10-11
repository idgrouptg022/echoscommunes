<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
