<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/login.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <title>ECHOS DES COMMUNES | CONNEXION</title>
</head>
<body>
    <div class="login-container">
        <form action="{{ route('guests:login') }}" method="post" class="login-form">
            @csrf
            <div class="login-form-header">
                <h1 class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </h1>
                <h2>Bon retour!</h2>
                <p>Nous sommes ravis de vous avoir à nouveau</p>
            </div>
            @include('includes.auth.flash')
            <div class="form-group">
                <input type="email" name="email" id="email" class="login-input" placeholder="Adresse mail...">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group input-group">
                <input type="password" name="password" id="password" class="login-input pwd" placeholder="Mot de passe">
                <i class="fas fa-eye-slash" id="toggle-password"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-forgotten-password-container">
                <a href="{{ route('guests:forgot-password-view') }}" class="form-forgotten-password">Mot de passe oublié ?</a>
            </div>
            <div class="form-button">
                <button type="submit" class="login-button">Se connecter</button>
            </div>
            <p class="form-info">Vous n'avez pas de compte ? <a href="{{ route('guests:register-view') }}">S'inscrire</a></p>
        </form>
    </div>
    <script src="{{ asset('assets/scripts/guests/register.js') }}"></script>
</body>
</html>
