@extends('layouts.app')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/about.css') }}">
@endsection

@section('content')
    <div class="about-header-container">
        <div class="about-header-cover">
            <h1>A propos</h1>
        </div>
    </div>
    <section class="container">
        <div class="about-text">
            <p><strong>Echos des communes</strong> est le premier site d'informations entièrement dédié à l'actualité des communes du Togo. Animé par une
                équipe dynamique composée de journalistes aguerris et dévoués, il offre aux internautes et à ses lecteurs, des informations
                diversifiées et crédibles sur les 117 communes que compte notre cher pays.
            </p>
        </div>
    </section>
@endsection

@section('extra-script')

@endsection
