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
                    @foreach ($banner_news as $banner_new)
                        <div class="swiper-slide">
                            <div class="swiper-content">
                                <h3 class="swiper-content-title">{{ $banner_new->title }}</h3>
                                <div class="swiper-content-text">
                                    <p>
                                        {{ $banner_new->description }}
                                    </p>
                                </div>
                                <a href="#" class="read-more">Lire plus</a>
                            </div>
                        </div>
                    @endforeach
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
        @foreach ($newsCategories as $item)

            @php
                $category = \App\Models\Category::where("id", $item->id)->first();
            @endphp

            @if ($loop->iteration == 1)

                <div class="first-news-container">
                    <div class="section-title-container">
                        <figure class="o-logo">
                            <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                        </figure>
                        <h3 class="section-title">{{ $category->name }}</h3>
                    </div>

                    <div class="first-news-content">
                        @php
                            $actualite = $category->news()->latest()->first();
                            $actualites = $category->news()->latest()->where("status", 1)->skip(1)->take(3)->get();
                        @endphp
                        <div class="news-content">
                            <div class="theOne">
                                <figure class="theOne-image">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image d'actualité">
                                    <figcaption>
                                        <h4 class="theOne-title">{{ $actualite->title }}</h4>
                                        <div class="theOne-info">
                                            <span class="theOne-author">{{ $actualite->authorable->name }} - </span>
                                            <span class="theOne-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                            <span class="theOne-comments"><i class="far fa-comment-alt"></i> 0</span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>

                            <div class="first-news-row">
                                @foreach ($actualites as $actualite)
                                    <div class="first-news-item">
                                        <figure class="first-news-image">
                                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image d'actualité">
                                        </figure>
                                        <div class="first-news-text">
                                            <h4 class="first-news-title">{{ $actualite->title }}</h4>
                                            <div class="first-news-info">
                                                <span class="first-news-author">{{ $actualite->authorable->name }} - </span>
                                                <span class="first-news-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                                <span class="first-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                            </div>
                                            <div class="first-news-description">
                                                <div class="news-text">{!! $actualite->description !!}</div>
                                                <a href="#" class="news-read-more">Lire plus</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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

            @elseif ($loop->iteration == 2)
                @php
                    $actualite = $category->news()->latest()->first();
                    $actualites = $category->news()->latest()->where("status", 1)->skip(1)->take(4)->get();
                @endphp

                <div class="second-news-container">
                    <div class="section-title-container">
                        <figure class="o-logo">
                            <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                        </figure>
                        <h3 class="section-title">{{ $category->name }}</h3>
                    </div>
                    <div class="second-news-content">
                        <div class="second-news-principal">
                            <figure class="second-news-principal-image">
                                <img src="{{ asset('storage/' . $actualite->image ) }}" alt="">
                                <figcaption>
                                    <a href="#" class="principal-title">{{ $actualite->title }}</a>
                                    <div class="principal-info">
                                        <span class="principal-author">{{ $actualite->authorable->name }} - </span>
                                        <span class="principal-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                        <span class="principal-comments"><i class="far fa-comment-alt"></i> 0</span>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="second-other-news">
                            @foreach ($actualites as $actualite)
                                <div class="second-other-news-item">
                                    <figure class="second-other-news-image">
                                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="">
                                        <figcaption>
                                            <div class="other-news-info">
                                                <span class="other-news-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                                <span class="other-news-comments"><i class="far fa-comment-alt"></i> 0</span>
                                            </div>
                                            <a href="#" class="other-news-title">{{ $actualite->title }}</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @elseif ($loop->iteration == 3)

                @php
                    $actualite = $category->news()->latest()->first();
                    $actualites = $category->news()->latest()->where("status", 1)->skip(1)->take(3)->get();
                @endphp

                <div class="third-news-container">
                    <div class="section-title-container">
                        <figure class="o-logo">
                            <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                        </figure>
                        <h3 class="section-title">{{ $category->name }}</h3>
                    </div>

                    <div class="third-news-content">
                        <div class="third-news-principal">
                            <figure class="third-news-principal-image">
                                <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image actualité">
                            </figure>
                            <div class="third-news-principal-info">
                                <a href="#" class="principal-title">{{ $actualite->title }}</a>
                                <div class="principal-subinfo">
                                    <span class="principal-author">{{ $actualite->authorable->name }} - </span>
                                    <span class="principal-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                </div>
                                <div class="third-news-description">{!! $actualite->description !!}</div>
                            </div>
                        </div>
                        <div class="third-other-news">
                            @foreach ($actualites as $actualite)
                                <div class="third-other-news-item">
                                    <figure class="third-other-news-image">
                                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image actualité">
                                    </figure>
                                    <div class="third-other-news-info">
                                        <a href="#" class="third-other-news-title">{{ $actualite->title }}</a>
                                        <div class="third-other-subinfo">
                                            <span class="third-other-author">{{ $actualite->authorable->name }} - </span>
                                            <span class="third-other-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                        </div>
                                        <div class="third-other-description">{!!  $actualite->description !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @elseif ($loop->iteration == 4)
                @php
                    $actualites = $category->news()->latest()->where("status", 1)->take(4)->get();
                @endphp
                <div class="fourth-news-containier">
                    <div class="section-title-container">
                        <figure class="o-logo">
                            <img src="{{ asset('assets/images/o logo.png') }}" alt="O Logo">
                        </figure>
                        <h3 class="section-title">{{ $category->name }}</h3>
                    </div>
                    <div class="fourth-news-content">
                        @foreach ($actualites as $actualite)
                            <div class="fourth-news-item">
                                <figure class="fourth-news-image">
                                    <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image actualité">
                                </figure>
                                <div class="fourth-news-info">
                                    <a href="#" class="fourth-news-title">{{ $actualite->title }}</a>
                                    <div class="fourth-subinfo">
                                        <span class="fourth-author">{{ $actualite->authorable->name }} - </span>
                                        <span class="fourth-date">{{ \Carbon\Carbon::parse($actualite->created_at)->format("d m, Y") }}</span>
                                    </div>
                                    <div class="fourth-description">{!! $actualite->description !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
            @endif

        @endforeach

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
