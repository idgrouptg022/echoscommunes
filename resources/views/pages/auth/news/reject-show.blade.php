@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/in-pending.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:news:reject-view') }}">Actualités rejetées</a></li>
            <li class="breadcrumb-item">Détails</li>
        </ol>
    </div>

    <div class="page__content__container">

        @include('includes.auth.flash')

        <div class="actualite-header-container">
            <a href="#!" onclick="event.preventDefault(); deleteActualite()" class="delete-actualite">Supprimer l'actualité</a>

            <form action="{{ route('auth:news:destroy', $actualite) }}" method="post" id="deleteForm" hidden>
                @csrf
                @method("DELETE")
            </form>

            <div class="reject-motif">
                <h3 class="reject-motif-title">Le motif du rejet:</h3>
                {!! $actualite->reject_motif !!}
            </div>
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
    </div>
@endsection

@section('extra-scripts')

@endsection
