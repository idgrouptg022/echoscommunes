@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:news:index', $category) }}">Actualites - {{ $category->name }}</a></li>
            <li class="breadcrumb-item">Edition</li>
        </ol>
    </div>

    <div class="page__content__container">

        @include('includes.auth.flash')

        <form action="{{ route('auth:news:update', $actualite) }}" class="editForm" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-header">
                <h1 class="form-title">Vous êtes dans la catégorie <span>"{{ $category->name }}"</span></h1>
                <a href="#!" onclick="event.preventDefault(); deleteActualite()" class="delete-actualite">Supprimer l'actualité</a>
            </div>
            <div class="form-flex-container">
                <div class="image-container">
                    <img src="{{ asset('storage/'. $actualite->image) }}" alt="Image d'actualité">
                </div>
                <div class="form-input-container">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" placeholder="Titre de l'actualité" autocomplete="off" value="{{ $actualite->title }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea name="body" id="content" rows="10" placeholder="Contenu de l'actualité">
                            {!! $actualite->body !!}
                        </textarea>
                    </div>
                    <div class="form-button-container">
                        <button type="submit" class="actualiteBtnSubmit">Modifier l'actualité</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <form action="{{ route('auth:news:destroy', $actualite) }}" method="post" id="deleteForm" hidden>
        @csrf
        @method("DELETE")
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
