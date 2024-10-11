@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h2 class="page__header__title">Actualité - {{ $category->name }}</h2>
    </div>

    <div class="page__content__container">
        @if ($message = Session::get('success'))
            <x-alert type="success" :$message />
        @endif

        @if ($message = Session::get("error"))
            <x-alert type="alert" :$message />
        @endif

        @if ($errors->any())
            <x-alert type="errors" :$errors message="" />
        @endif

        <div class="sub-content">
            <form action="{{ route('auth:news:categories:update', $category) }}" class="category-name-form" method="POST">
                @csrf
                @method("PATCH")
                <div class="form__group flex">
                    <span>
                        <label for="name" class="form__label">Nom de la catégorie: </label>
                        <input type="text" name="name" id="name" placeholder="Nom de la catégorie" class="input__form" autocomplete="off" value="{{ $category->name }}">
                    </span>
                    <button type="submit">Modifier</button>
                </div>
            </form>

            <div class="delete-category-container">
                <a href="#!"  onclick="modalOpener(this)" data-target="#deleteCategory" class="delete-category">Supprimer la catégorie</a>
            </div>
        </div>

        <a href="{{ route('auth:news:create', $category) }}" class="addNewsButton"><i class="fas fa-plus-circle"></i> Ajouter une actualité</a>

        <div class="table-container">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date de pub.</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Comm.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @forelse ($actualites as $actualite)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                <span>{{ \Carbon\Carbon::parse($actualite->created_at)->format('d-m-Y') }}</span>
                            </td>
                            <td>{{ $actualite->title }}</td>
                            <td>{{ $actualite->authorable->name }}</td>
                            <td>1</td>
                            <td>
                                @if ($actualite->authorable instanceOf \App\Models\User)
                                     @if ($user->id === $actualite->authorable->id)
                                        <a href="{{ route('auth:news:edit', [$category, $actualite]) }}" class="edit-new">Détails</a>
                                    @endif
                                @endif

                                <a href="{{ route('auth:news:show', [$category, $actualite]) }}" class="show-new">Lire</a>
                            </td>
                        </tr>

                        @php
                            $i++;
                        @endphp
                    @empty
                        <tr style="text-align: center;">
                            <td colspan="6">Aucun enregistrement dans cette catégorie</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="modal__container" id="deleteCategory">
            <div class="modal">
                <div class="modal__body deleteModalCategory">
                    <h2>Supprimer une catégorie</h2>
                    <p>Vous êtes sûr de vouloir supprimer cette catégorie ?</p>
                    <p>En cliquant sur <strong>"Oui supprimer"</strong>, vous acceptez que les actualités reliées à cette catégorie soient supprimées</p>
                    <p>Cette action est irréversible</p>
                    <form action="{{ route('auth:news:categories:destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                        <button type="button" class="btn btn-outline-danger" onclick="closeModal(this)">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection
