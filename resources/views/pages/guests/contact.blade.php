@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/contact.css') }}">
@endsection

@section('content')
    <div class="contact-header-container">
        <div class="contact-header-cover">
            <h1>Contact</h1>
        </div>
    </div>
    <section class="container">
        <div class="contact-container">
            <div class="contact-left">
                <h3 class="contact-subtitle">
                    Avez-vous une inquiétude ou question, ecrivez-nous via le formulaire
                </h3>
                <form action="" method="post" class="sendMessage">
                    @csrf
                    <div class="contact-form-group">
                        <label for="user-name">Nom & Prénom(s)</label>
                        <input type="text" name="user-name" id="user-name" class="contact-input" placeholder="Nom & Prénom(s)...">
                    </div>
                    <div class="contact-form-group">
                        <label for="user-email">Adresse électronique</label>
                        <input type="email" name="user-email" id="user-email" class="contact-input" placeholder="Adresse électronique...">
                    </div>
                    <div class="contact-form-group">
                        <label for="user-message">Message</label>
                        <textarea name="user-message" id="user-message" rows="8" placeholder="Votre message..."></textarea>
                    </div>
                    <div class="contact-button-container">
                        <button type="submit" class="contact-button">Envoyer</button>
                    </div>
                </form>
            </div>
            <div class="contact-right">
                <h3>Réseaux sociaux et autres</h3>
                <div class="contact-social-container">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                                <span>@echoscommunestg</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-x-twitter"></i>
                                <span>@echoscommunestg</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                                <span>@echoscommunestg</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                                <span>@echoscommunestg</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>
                                <span>@echoscommunestg</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:">
                                <i class="fa fa-envelope"></i>
                                <span>contact@echosdescommunes.com</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:">
                                <i class="fa fa-phone"></i>
                                <span>(+228) 90 74 50 71 / 99 08 23 06</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-script')

@endsection
