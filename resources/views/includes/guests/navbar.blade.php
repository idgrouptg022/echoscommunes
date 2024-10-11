<nav class="navbar">
    <div class="navbar-left-content">
        <div class="navbar-icon-container">
            <i class="fa fa-bars navbar-icon"></i>
        </div>
        <figure class="navbar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </figure>
    </div>
    <ul class="navbar-menu">
        <li><a href="{{ route('guests:home') }}">Accueil</a></li>
        <li><a href="{{ route('guests:about') }}">A Propos</a></li>
        <li class="dropdown-menu">
            <a>Actualites <i class="fas fa-chevron-down"></i></a>
            <div class="dropdown__wrapper">
                <div class="dropdown">
                    <ul class="list-items-with-description">
                        <li><a href="#">Développement</a></li>
                        <li><a href="#">Santé</a></li>
                        <li><a href="#">Education</a></li>
                        <li><a href="#">Interview</a></li>
                        <li><a href="#">Portrait</a></li>
                        <li><a href="#">Economie</a></li>
                        <li><a href="#">Environnement</a></li>
                        <li><a href="#">Politique</a></li>
                        <li><a href="#">Culture</a></li>
                        <li><a href="#">International</a></li>
                    </ul>
                </div>
            </div>
        </li>
        <li><a href="{{ route('guests:contact') }}">Contacts</a></li>
    </ul>
    <div class="navbar-right-content">
        <ul class="navbar-user">
            <li><a href="{{ route('guests:register-view') }}" class="sign-up">S'inscrire</a></li>
            <li><a href="{{ route('guests:login-view') }}" class="sign-in"><i class="fas fa-sign-in"></i> Se connecter</a></li>
        </ul>
    </div>
</nav>
