@extends('layouts.auth')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/messages.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h2 class="page__header__title">Messages</h2>
    </div>

    <div class="page__content__container">
       @include('includes.auth.flash')

        {{-- <a href="" class="addNewsButton"><i class="fas fa-plus-circle"></i> Ajouter une actualité</a> --}}

        <div class="message-container">
            <div class="tabs-container">
                <ul class="tabs">
                    @foreach ($messages as $message)
                        <li class="tab-item">
                            <a href="#" data-url="{{ route('auth:messages:show', $message) }}" class="tab-link" onclick="event.preventDefault(); openMessage(this)">
                                <div>
                                    <svg  viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                                    </svg>
                                    <div class="user-info">
                                        <span class="fullname">{{ $message->fullname }}</span>
                                        <span class="email">{{ $message->email }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="posted-date">{{ \App\Helpers\Contact::getDate($message->created_at) }}</span>
                                    <span class="state {{ $message->is_viewed == 0 ? 'not_viewed' : '' }}">{{ \App\Helpers\Contact::viewedStateFormat($message->is_viewed) }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="messages-wrapper">
                    <div class="message-content" id="message-content">
                        <figure class="message-logo">
                            <img src="{{ asset('assets/images/o logo.png') }}" alt="Logo">
                            <figcaption>Echos Des Communes</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/scripts/axios.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/auth/message.js') }}"></script>
@endsection
