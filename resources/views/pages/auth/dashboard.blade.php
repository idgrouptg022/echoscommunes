@extends('layouts.auth')

@section('extra-styles')

@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Tableau de bord</h1>
    </div>

    <div class="page__content__container">
        @include('includes.auth.flash')
    </div>
@endsection

@section('extra-scripts')

@endsection
