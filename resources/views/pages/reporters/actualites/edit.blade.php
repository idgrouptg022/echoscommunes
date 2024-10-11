@extends('layouts.reporter')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guests:reporters:actualites:index', $category) }}">Actualites - {{ $category->name }}</a></li>
            <li class="breadcrumb-item">Edition d'actualité</li>
        </ol>
    </div>
    <div class="page__content__container">
        @include('includes.auth.flash')

        <form action="{{ route('guests:reporters:actualites:update', $actualite) }}" class="editForm" method="post" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            @include('includes.reporters.edit-actualite')
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
