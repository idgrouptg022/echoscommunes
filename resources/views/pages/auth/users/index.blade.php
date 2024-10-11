@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/users/index.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h2 class="page__header__title">Administrateurs</h2>
    </div>
    <div class="page__content__container">
        @include('includes.auth.flash')
        <div class="register-user-button">
            <a href="#!" onclick="modalOpener(this)" data-target="#registerNewUser"><i class="fas fa-plus"></i> Enregistrer un nouvel utilisateur</a>
        </div>
        <div class="table-container">
            <table class="table-default">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Nom & Prénoms</th>
                        <th>Email</th>
                        <th>Date d'enregistrement</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->avatar
                                ? asset('storage/app/public' . $user->avatar)
                                : asset('assets/images/avatar-default.png') }}" alt="Avatar de {{ $user->name }}" class="user-avatar">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->locale("fr_FR")->isoFormat('LL') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Aucun enregistrement</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal__container" id="registerNewUser">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:users:register') }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom complet: </label>
                            <input type="text" name="name" id="name" placeholder="Nom complet" class="input__form" autocomplete="off">
                        </div>
                        <div class="form__group">
                            <label for="email" class="form__label">Adresse électronique: </label>
                            <input type="email" name="email" id="email" placeholder="Adresse électronique" class="input__form" autocomplete="off">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection
