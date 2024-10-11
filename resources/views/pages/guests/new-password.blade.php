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
        <form action="{{ route('guests:new-password') }}" method="post" class="login-form">
            @csrf
            <div class="login-form-header">
                <h1 class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </h1>
                <h2>Nouveau mot de passe!</h2>
                <p style="margin-top: .8rem;">Nous vous avons envoyé un mail contenant un code de vérification, Renseignez le code et modifiez votre mot de passe</p>
            </div>
            <div class="form-group">
                <input type="text" name="code" id="code" class="login-input" placeholder="Code de vérification...">
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <p class="form-info" style="margin-bottom: 1.3rem;">
                Code non reçu ?
                <a href="#!" onclick="event.preventDefault(); document.getElementById('resendCode').submit()"> Renvoyer un autre code</a>
            </p>

            <div class="form-group input-group">
                <input type="password" name="password" id="password" class="login-input pwd" placeholder="Nouveau mot de passe">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <i class="fas fa-eye-slash" id="toggle-password"></i>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="login-input pwd" placeholder="Confirmer le mot de passe">
            </div>
            <div class="form-button">
                <button type="submit" class="login-button">Soumettre</button>
            </div>
        </form>
        <form action="{{ route('guests:resend-code') }}" method="post" id="resendCode" hidden>@csrf</form>
    </div>
    <script src="{{ asset('assets/scripts/guests/register.js') }}"></script>
</body>
</html>
