@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
@endsection

@section('content')
    <section class="banniere-container">
        <div class="banniere-content">
            <div class="swiper" id="banner-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="swiper-content">
                            <h3 class="swiper-content-title">Le plan de développement communal (PDC) validé</h3>
                            <div class="swiper-content-text">
                                <p>
                                    Le président de la République, Faure Essozimna Gnassingbé, a adressé le mardi 23 juillet 2024,
                                    un message de félicitation à son homologue rwandais, Paul Kagame, réelu pour un nouveau mandat à la tête du pays
                                </p>
                            </div>
                            <a href="#" class="read-more">Lire plus</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-content">
                            <h3 class="swiper-content-title">Golfe2: Le maire AMAGLO n'est plus</h3>
                            <div class="swiper-content-text">
                                <p>
                                    Dr Senamé James AMAGLO s'en est allé ce dimanche 14 juillet 2024, des suites d'une maladie alors était en hospitalisation
                                    à Lomé.
                                </p>
                                <p>
                                    Le vaillant et dynamique maire de la commune de Bè Centre a laissé derrière lui toute la population de Bè centre.
                                </p>
                            </div>
                            <a href="#" class="read-more">Lire plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-box">
                <h2 class="welcome-title">Bienvenue</h2>
                <h3 class="welcome-subtitle">sur</h3>
                <figure class="welcome-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </figure>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="first-news-container">
            <div class="section-title-container">
                <figure class="o-logo">
                    <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                </figure>
                <h3 class="section-title">Développement</h3>
            </div>

            <div class="first-news-content">
                <div class="news-content">
                    <div class="theOne">
                        <figure class="theOne-image">
                            <img src="{{ asset('assets/images/news1.jpg') }}" alt="Image d'actualité">
                            <figcaption>
                                <h4 class="theOne-title">Golfe 1/ Employabilité des jeunes: deux jours d'échange bouclés avec les institutions clés</h4>
                                <div class="theOne-info">
                                    <span class="theOne-author">La redaction - </span>
                                    <span class="theOne-date">22 06, 2024</span>
                                    <span class="theOne-comments"><i class="far fa-comment-alt"></i> 0</span>
                                </div>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="first-news-row">
                        <div class="first-news-item">
                            <figure class="first-news-image">
                                <img src="{{ asset('assets/images/news2.jpg') }}" alt="Image d'actualité">
                            </figure>
                            <div class="first-news-text">
                                <h4 class="first-news-title">Golfe1/Réinsertion sociale des toxicomanes: ces jolis articles à découvrir à tout prix </h4>
                                <div class="first-news-info">
                                    <span class="first-news-author">La redaction - </span>
                                    <span class="first-news-date">22 06, 2024</span>
                                    <span class="first-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                </div>
                                <div class="first-news-description">
                                    <div class="news-text">
                                        Le projet de réinsertion sociale des jeunes résidant des ghzttos de Bè (Commune Golfe1), démarré en décembre 2022,
                                        produitde reluisants résultats sur le terrain
                                    </div>
                                    <a href="#" class="news-read-more">Lire plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="first-news-item">
                            <figure class="first-news-image">
                                <img src="{{ asset('assets/images/news3.jpg') }}" alt="Image d'actualité">
                            </figure>
                            <div class="first-news-text">
                                <h4 class="first-news-title">Agoe Nyivé2 et 4 : initiation des femmes à l'arbitrage de football et au tissage de filets </h4>
                                <div class="first-news-info">
                                    <span class="first-news-author">La redaction - </span>
                                    <span class="first-news-date">22 06, 2024</span>
                                    <span class="first-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                </div>
                                <div class="first-news-description">
                                    <div class="news-text">
                                        Le projet de réinsertion sociale des jeunes résidant des ghzttos de Bè (Commune Golfe1), démarré en décembre 2022,
                                        produitde reluisants résultats sur le terrain
                                    </div>
                                    <a href="#" class="news-read-more">Lire plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="first-news-item">
                            <figure class="first-news-image">
                                <img src="{{ asset('assets/images/news5.jpeg') }}" alt="Image d'actualité">
                            </figure>
                            <div class="first-news-text">
                                <h4 class="first-news-title">Agroalimentaire/ DAGL et région des Aquitaines (France): la CRM-DAGL</h4>
                                <div class="first-news-info">
                                    <span class="first-news-author">La redaction - </span>
                                    <span class="first-news-date">22 06, 2024</span>
                                    <span class="first-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                </div>
                                <div class="first-news-description">
                                    <div class="news-text">
                                        Le projet de réinsertion sociale des jeunes résidant des ghzttos de Bè (Commune Golfe1), démarré en décembre 2022,
                                        produitde reluisants résultats sur le terrain
                                    </div>
                                    <a href="#" class="news-read-more">Lire plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="firstAds-container">
                    <div class="youtube-news-container">
                        <iframe src="https://www.youtube.com/embed/Wa9EmwJOps8" title="MESSAGE DE VŒUX DU MAIRE GOMADO À L&#39;OCCASION DU NOUVEL AN 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <h5 class="ytb-news-title">Message de voeux du maire Gomado à l'occasion du nouvel an 2024</h5>
                    </div>
                    <div class="fb-news-container">
                        <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FGouvTg%2Fposts%2Fpfbid07UFB9bJF8nFasWDnmPWWddf6EWSAp71eXgynAFhK5QDbLytaK9TTfS4J2CsqV4YXl&show_text=true&width=470" width="500" height="709" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="second-news-container">
            <div class="section-title-container">
                <figure class="o-logo">
                    <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                </figure>
                <h3 class="section-title">Santé</h3>
            </div>
            <div class="second-news-content">
                <div class="second-news-principal">
                    <figure class="second-news-principal-image">
                        <img src="{{ asset('assets/images/news4.jpg') }}" alt="">
                        <figcaption>
                            <a href="#" class="principal-title">Golfe1/JNS: la mairie appelle à une grande mobilisation</a>
                            <div class="principal-info">
                                <span class="principal-author">La redaction - </span>
                                <span class="principal-date">22 06, 2024</span>
                                <span class="principal-comments"><i class="far fa-comment-alt"></i> 0</span>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="second-other-news">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="second-other-news-item">
                            <figure class="second-other-news-image">
                                <img src="{{ asset('assets/images/news6.jpg') }}" alt="">
                                <figcaption>
                                    <div class="other-news-info">
                                        <span class="other-news-date">22 06, 2024</span>
                                        <span class="other-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                    </div>
                                    <a href="#" class="other-news-title">Golfe1/: la mairie offre des matériels de soins</a>
                                </figcaption>
                            </figure>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="third-news-container">
            <div class="section-title-container">
                <figure class="o-logo">
                    <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                </figure>
                <h3 class="section-title">Education</h3>
            </div>

            <div class="third-news-content">
                <div class="third-news-principal">
                    <figure class="third-news-principal-image">
                        <img src="{{ asset('assets/images/news7.jpeg') }}" alt="Image actualité">
                    </figure>
                    <div class="third-news-principal-info">
                        <a href="#" class="principal-title">Moyen Mono: 1336 élèves décidés à en finir avec les violences à caractère sexuel</a>
                        <div class="principal-subinfo">
                            <span class="principal-author">La redaction - </span>
                            <span class="principal-date">22 06, 2024</span>
                        </div>
                        <div class="third-news-description">
                            Après la région centrale, la cellule genre du ministère des enseignements primaire, secondaire et technique était
                        </div>
                    </div>
                </div>
                <div class="third-other-news">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="third-other-news-item">
                            <figure class="third-other-news-image">
                                <img src="{{ asset('assets/images/news8.jpeg') }}" alt="Image actualité">
                            </figure>
                            <div class="third-other-news-info">
                                <a href="#" class="third-other-news-title">Education sociale des jeunes: Laré Joiah-Bike interpelle le ministère de la Jeunesse</a>
                                <div class="third-other-subinfo">
                                    <span class="third-other-author">La redaction - </span>
                                    <span class="third-other-date">22 06, 2024</span>
                                </div>
                                <div class="third-other-description">
                                    C'est par un communiqué publié jeudi que le président de l'Association nationale des conseillers de
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="fourth-news-containier">
            <div class="section-title-container">
                <figure class="o-logo">
                    <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                </figure>
                <h3 class="section-title">Interview</h3>
            </div>
            <div class="fourth-news-content">
                @for ($i = 0; $i < 4; $i++)
                    <div class="fourth-news-item">
                        <figure class="fourth-news-image">
                            <img src="{{ asset('assets/images/news9.jpg') }}" alt="Image actualité">
                        </figure>
                        <div class="fourth-news-info">
                            <a href="#" class="fourth-news-title">Education sociale des jeunes: Laré Joiah-Bike interpelle le ministère de la Jeunesse</a>
                            <div class="fourth-subinfo">
                                <span class="fourth-author">La redaction - </span>
                                <span class="fourth-date">22 06, 2024</span>
                            </div>
                            <div class="fourth-description">
                                C'est par un communiqué publié jeudi que le président de l'Association nationale des conseillers de
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection

@section('extra-script')
    <script src="{{ asset('assets/scripts/swiper.min.js') }}"></script>
    <script>
        const swiper = new Swiper('#banner-swiper', {
            // Optional parameters
            slidesPerView: 1,
            spaceBetween: 1,
            breakpoints: {
                770: {
                slidesPerView: 2,
                spaceBetween: 70
                }
            },
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>
@endsection
