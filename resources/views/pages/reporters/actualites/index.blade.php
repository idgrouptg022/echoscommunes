@extends('layouts.reporter')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/news/index.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h2 class="page__header__title">Actualité - {{ $category->name }}</h2>
    </div>

    <div class="page__content__container">
        @include('includes.auth.flash')

        <div class="table-container">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date de pub.</th>
                        {{-- <th>Image</th> --}}
                        <th>Titre</th>
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
                            {{-- <td>{{ $actualite->authorable->name }}</td> --}}
                            <td>1</td>
                            <td>
                                <a href="{{ route('guests:reporters:actualites:edit', $actualite) }}" class="edit-new">Editer</a>

                                <a href="{{ route('guests:reporters:actualites:show', $actualite) }}" class="show-new">Lire</a>
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
    </div>
@endsection

@section('extra-scripts')

@endsection
