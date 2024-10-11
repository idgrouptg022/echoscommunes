<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/login.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <title>EDC | MOT DE PASSE OUBLIE</title>
</head>
<body>
    <div class="login-container">
        <form action="{{ route('guests:forgot-password') }}" method="post" class="login-form">
            @csrf
            <div class="login-form-header">
                <h1 class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </h1>
                <h2>Mot de passe oublié ?</h2>
                <p>Renseigner votre email et modifier votre mot de passe</p>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="login-input" placeholder="Adresse mail...">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-button">
                <button type="submit" class="login-button">Envoyer le code</button>
            </div>
            <p class="form-info"><a href="{{ route('guests:register-view') }}"><i class="fas fa-sign-in"></i> Se connecter ici</a></p>
        </form>
    </div>
    <script src="{{ asset('assets/scripts/guests/register.js') }}"></script>
</body>
</html>
