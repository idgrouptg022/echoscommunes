@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/actualites/index.css') }}">
@endsection

@section('content')
    <div class="actualites-header-container">
        <div class="actualites-header-cover">
            <h1>{{ $category->name }}</h1>
        </div>
    </div>
    <section class="container">
        <div class="actualites-list">
            @forelse ($actualites as $actualite)
                <div class="actualites-item">
                    <figure class="actualites-image">
                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image d'actualite" loading="lazy">
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
                <p>Aucune actualité pour le moment.</p>
            @endforelse
        </div>
    </section>
@endsection

@section('extra-script')

@endsection
