@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <form action="{{ route('guests:register') }}" method="post" class="register-form">
            @csrf
            <div class="register-form-header">
                <h1 class="logo-container">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </h1>
                <h2>Inscription</h2>
                <p>Démarrez avec nous en créant votre compte</p>
            </div>

            <div class="form-group">
                <input type="text" name="firstname" id="firstname" class="register-input" placeholder="Prénom(s)...">
                @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="lastname" id="lastname" class="register-input" placeholder="Nom...">
                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="register-input" placeholder="Adresse mail...">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" name="phone" id="phone" class="register-input" placeholder="Numéro de téléphone...">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group input-group">
                <input type="password" name="password" id="password" class="register-input pwd" placeholder="Mot de passe">
                <i class="fas fa-eye-slash" id="toggle-password"></i>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="register-input pwd" placeholder="Confirmer le mot de passe">
            </div>
            <div class="form-button">
                <button type="submit" class="register-button">S'inscrire</button>
            </div>
            <p class="form-info">Avez-vous déjà un compte ? <a href="{{ route('guests:login-view') }}">Se connecter</a></p>
        </form>
    </div>
@endsection

@section('extra-script')
    <script src="{{ asset('assets/scripts/guests/register.js') }}"></script>
@endsection
