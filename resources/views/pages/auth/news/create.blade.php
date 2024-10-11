@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('auth:news:index', $category) }}">Actualites - {{ $category->name }}</a></li>
            <li class="breadcrumb-item">Nouveau</li>
        </ol>
    </div>

    <div class="page__contnet__container">
        <form action="{{ route('auth:news:store', $category) }}" class="addNewForm" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="form-title">Vous êtes dans la catégorie <span>"{{ $category->name }}"</span></h1>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" placeholder="Titre de l'actualité" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="body" id="content" rows="10" placeholder="Contenu de l'actualité"></textarea>
            </div>
            <div class="form-button-container">
                <button type="submit" class="actualiteBtnSubmit">Publier l'actualité</button>
            </div>
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js.map') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
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
