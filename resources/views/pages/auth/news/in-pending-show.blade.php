@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/in-pending.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:news:in-pending') }}">Actualites en cours</a></li>
            <li class="breadcrumb-item">Edition</li>
        </ol>
    </div>

    <div class="page__content__container">
        @include('includes.auth.flash')

        <div class="actualite-header-container">
            <a href="#!" onclick="event.preventDefault(); document.getElementById('acceptArticleForm').submit()" class="accept_button">Valider l'article</a>
            <a href="#" onclick="modalOpener(this)" data-target="#rejectArticle" class="reject_button">Rejeter l'article</a>

            <form action="{{ route('auth:news:accept', $actualite) }}" method="post" id="acceptArticleForm">@csrf</form>
        </div>

        <div class="actualite-container">
            <figure class="actualite-img">
                <img src="{{ asset('storage/' . $actualite->image) }}" alt="">
            </figure>
            <div class="actualite-content">
                <h2 class="actualite-title">{{ $actualite->title }}</h2>
                <div class="actualite-category">{{ $actualite->category->name }}</div>
                <p class="actualite-date">{{ __('publié le ') . \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('LL') }}</p>
                <p class="actualite-author">{{ __('-') . $actualite->authorable->name }}</p>
                <div class="actualite-body">
                    {!! $actualite->body !!}
                </div>
            </div>
        </div>

        <div class="modal__container" id="rejectArticle">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:news:reject', $actualite) }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="motif_reject" class="form__label">Motif du rejet: </label>
                            <textarea name="motif_reject" id="motif_reject" rows="10" class="input__form" placeholder="Motif du rejet"></textarea>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Envoyer</button>
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
