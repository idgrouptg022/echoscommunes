@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/in-pending.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/create.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
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
            <a href="#" onclick="modalOpener(this)" data-target="#rejectArticle" class="reject_button">Mettre au brouillon</a>

            <form action="{{ route('auth:news:accept', $actualite) }}" method="post" id="acceptArticleForm">@csrf</form>
        </div>

        <div class="actualite-container">

            <form action="{{ route('auth:news:update', [$actualite, true]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("PATCH")
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
                            <label for="pub-date">Date de publication (optionnel)</label>
                            <input type="date" id="pub-date" name="publication_date" value="{{ $actualite->publication_date != null ? \Carbon\Carbon::parse($actualite->publication_date)->format('Y-m-d') : '' }}">
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


            {{-- <div class="actualite-content">
                <h2 class="actualite-title">{{ $actualite->title }}</h2>
                <div class="actualite-category">{{ $actualite->category->name }}</div>
                <p class="actualite-date">{{ __('publié le ') . \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('LL') }}</p>
                <p class="actualite-author">{{ __('-') . $actualite->authorable->name }}</p>
                <div class="actualite-body">
                    {!! $actualite->body !!}
                </div>
            </div> --}}
        </div>

        <div class="modal__container" id="rejectArticle">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:news:reject', $actualite) }}" method="POST">
                        @csrf
                        <div class="form__group">
                            <label for="motif_reject" class="form__label">Motif: </label>
                            <textarea name="motif_reject" id="motif_reject" rows="10" class="input__form" placeholder="Renseigner le motif"></textarea>
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
