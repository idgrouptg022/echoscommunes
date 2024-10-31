@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:news:index', $category) }}">Actualites - {{ $category->name }}</a></li>
            <li class="breadcrumb-item">Détails</li>
        </ol>
    </div>

    <div class="page__content__container">

        @include('includes.auth.flash')

        <div class="form-header">
            <h1 class="form-title">Vous êtes dans la catégorie <span>"{{ $category->name }}"</span></h1>
            <a href="#!" onclick="event.preventDefault(); deleteActualite()" class="delete-actualite">Supprimer l'actualité</a>
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
    <form action="{{ route('auth:news:destroy', $actualite) }}" method="post" id="deleteForm" hidden>
        @csrf
    </form>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js.map') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <script src="{{ asset('assets/scripts/auth/actualite.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                placeholder: "Contenu de l'actualité...",
                lang: 'fr-FR',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                ]
            });
        })
    </script>
@endsection
