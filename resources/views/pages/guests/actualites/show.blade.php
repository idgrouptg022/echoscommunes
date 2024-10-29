@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/show.css') }}">
@endsection

@section('content')
    <div class="actualites-header-container">
        <div class="actualites-header-cover">
            <ul class="actualites-breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('guests:actualites:index', [$category]) }}">{{ $category->name }}</a>
                    <i class="fas fa-angle-right"></i>
                </li>
                <li class="breadcrumb-item active">
                    <span>{{ $actualite->title }}</span>
                </li>
            </ul>
        </div>
    </div>
    <section class="container">
        <div class="actualites-container">
            <div class="current-actualite-container">
                <figure class="current-actualite-image">
                    <img src="{{ asset('storage/'. $actualite->image) }}" alt="Image d'actualité">
                </figure>
                <div class="current-actualites-content">
                    <h1 class="current-actualite-title">{{ $actualite->title }}</h1>
                    <div class="current-actualite-category">{{ $actualite->category->name }}</div>
                    <div class="current-actualite-info">
                        <p class="current-actualite-date">{{ \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('ll') . __(' par ') }}</p>
                        <p class="current-actualite-author">{{ $actualite->authorable->name }}</p>
                    </div>
                    <div class="current-actualite-body">
                        {!! $actualite->body !!}
                    </div>
                </div>
            </div>
            <div class="actualites-list">
                @forelse ($actualites as $actualite)
                    <div class="actualites-item">
                        <figure class="actualites-image">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image d'actualite">
                        </figure>
                        <div class="actualites-content">
                            <div class="actualites-sub-header">
                                <span class="actualites-author">{{ $actualite->authorable->name }}</span>,
                                <span class="actualites-published-at">{{ \Carbon\Carbon::parse($actualite->created_at)->locale("fr")->isoFormat("ll") }}</span>
                            </div>
                            <h2 class="actualites-title">{{ $actualite->title }}</h2>
                            <div class="actualites-read">
                                <a href="{{ route('guests:actualites:show', [$category, $actualite]) }}" class="actualites-read-btn">Lire plus</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="other-none-actualite">Aucune autre actualité pour le moment.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('extra-script')

@endsection
