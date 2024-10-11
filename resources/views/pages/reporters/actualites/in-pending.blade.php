@extends('layouts.reporter')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/reporters/news/in-pending.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <ol class="page-header-breadcrumb">
            <li class="breadcrumb-item">Actualites en cours</li>
        </ol>
    </div>

    <div class="page__contnet__container">
        <div class="in-pending-container">
            @foreach ($actualites as $actualite)
                <div class="in-pending-item">
                    <div class="in-pending-header">
                        <div class="in-pending-left">
                            <span class="in-pending-title">{{ $actualite->title }}</span>
                            <span class="in-pending-category">{{ $actualite->category->name }}</span>
                            <span class="in-pending-date">envoyé le {{ \Carbon\Carbon::parse($actualite->created_at)->locale("fr")->isoFormat('LL') }}</span>
                        </div>
                    </div>
                    <div class="in-pending-body">
                        {!! $actualite->description !!}
                    </div>
                    <div class="in-pending-footer">
                        <a href="{{ route('guests:reporters:actualites:in-pending-edit', $actualite) }}" class="primary__link__btn">Tout lire</a>
                        <a href="#" onclick="event.preventDefault(); destroyActualite();" class="trash-button"><i class="fas fa-trash-alt"></i></a>
                        <form action="{{ route('guests:reporters:actualites:destroy', $actualite) }}" method="post" hidden id="deletePendingNews">
                            @csrf
                            @method("DELETE")
                        </form>
                    </div>
                </div>
            @endforeach
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

        const destroyActualite = () => {
            if (confirm('Voulez-vous supprimer cette actualité ?')) {
                document.getElementById("deletePendingNews").submit();
            }
        }
    </script>
@endsection
