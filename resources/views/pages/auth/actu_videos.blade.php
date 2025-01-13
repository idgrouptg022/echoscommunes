@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/actu_videos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/users/index.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Actu Videos</h1>
    </div>

    <div class="page__contnet__container">

        <div class="register-user-button">
            <a href="#!" onclick="modalOpener(this)" data-target="#addActuVideo"><i class="fas fa-plus"></i> Enregistrer une actu vidéo</a>
        </div>

        @include("includes.auth.flash")

        <div class="actuVideos">
            @foreach ($actuVideos as $actuVideo)
                <div class="actuVideo-item">
                    <iframe class="panel-video" src="https://www.youtube.com/embed/{{ $actuVideo->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="actuVideo-mask">
                        <h2 class="actuVideo-title">{{  $actuVideo->title }}</h2>
                        <div class="actuVideo-actions">
                            <a href="#" onclick="modalOpener(this)" data-target="#editActuVideo{{ $actuVideo->id }}">Editer</a>
                            <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette actu vidéo ?') ? document.getElementById('deleteActuVideo{{ $actuVideo->id }}').submit() : ''">Supprimer</a>
                            <form action="{{ route('auth:actuVideo:destroy', $actuVideo) }}" method="POST" id="deleteActuVideo{{ $actuVideo->id }}">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal__container" id="editActuVideo{{ $actuVideo->id }}">
                    <div class="modal">
                        <div class="modal__body">
                            <form action="{{ route('auth:actuVideo:update', $actuVideo) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PATCH")
                                <div class="form__group">
                                    <label for="title" class="form__label">Titre</label>
                                    <input type="text" name="title" id="title" placeholder="Titre de l'actualité..." class="input__form" value="{{ $actuVideo->title }}">
                                </div>
                                <div class="form__group">
                                    <label for="link" class="form__label">Lien</label>
                                    <input type="url" name="link" id="link" placeholder="Le Lien youtube..." class="input__form" value="https://youtu.be/{{ $actuVideo->link }}">
                                </div>
                                <div class="form__button">
                                    <button type="submit" class="button__green">Valider la modification</button>
                                    <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal__container" id="addActuVideo">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth:actuVideo:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre</label>
                            <input type="text" name="title" id="title" placeholder="Titre de l'actualité..." class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="link" class="form__label">Lien</label>
                            <input type="url" name="link" id="link" placeholder="Le Lien youtube..." class="input__form">
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Valider la modification</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    {{-- <script>
        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };
    </script> --}}
@endsection
