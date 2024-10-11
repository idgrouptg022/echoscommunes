@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/in-pending.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h2 class="page__header__title">Actualité - En cours</h2>
    </div>

    <div class="page__content__container">
        @include('includes.auth.flash')

        <div class="table-container">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date de pub.</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Catégorie</th>
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
                            <td>{{ $actualite->category->name }}</td>
                            <td>
                                <a href="{{ route('auth:news:in-pending-show', $actualite) }}" class="show-new">Détails</a>
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
                    <h2>Supprimer une actualité</h2>
                    <p>Vous êtes sûr de vouloir supprimer cette actualité ?</p>
                    <p>En cliquant sur <strong>"Oui supprimer"</strong>, vous acceptez que les actualités reliées à cette catégorie soient supprimées</p>
                    <p>Cette action est irréversible</p>
                    {{-- <form action="{{ route('auth:news:categories:destroy', $category) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                        <button type="button" class="btn btn-outline-danger" onclick="closeModal(this)">Annuler</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection
