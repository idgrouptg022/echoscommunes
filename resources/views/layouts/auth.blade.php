<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/o logo.png') }}">
    <title>Echo Communes | Admin</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('extra-styles')
</head>
<body>

    @php
        $newsCategories = \App\Models\Category::all();
    @endphp


    @include('includes.auth.sidebar')

    <main>
        @yield('content')

        <div class="modal__container" id="addNewsCategories">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:news:categories:store') }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom de la catégorie: </label>
                            <input type="text" name="name" id="name" placeholder="Nom de la catégorie" class="input__form" autocomplete="off">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/scripts/auth/base.js') }}"></script>
    @yield('extra-scripts')
</body>
</html>
