@extends('layouts.reporter')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item">Actualites - Nouveau</li>
        </ol>
    </div>

    <div class="page__contnet__container">
        <form action="{{ route('guests:reporters:actualites:store') }}" class="addNewForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">Catégorie</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error("category")
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" placeholder="Titre de l'actualité" autocomplete="off">
                @error("title")
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" accept="image/*">
                @error("image")
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="body" id="content" rows="10" placeholder="Contenu de l'actualité"></textarea>
                @error("body")
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
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
