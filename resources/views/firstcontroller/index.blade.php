@extends('layouts.template')
@section('Title', 'Home - ')
@section('Description', 'Let yourself be carried away by the music')

@section('content')
@guest
<section class="accueil_guest">
    <div class="d-lg-flex">
        <div class="text">
            <h1>Mouud, the sound of your mood</h1>
            <a data-pjax class="btn btn_fondBleu" href="{{ route('register') }}">Play your mood</a>
        </div>
        <div>
            <img class="woman" src="/image/accueil/women_illus.png" alt="woman" />
        </div>
    </div>
    <div class="wave_fond">
        <img src="/image/accueil/wave_orange.png" />
        <img src="/image/accueil/wave_blue.png" />
    </div>
</section>
@endguest
@auth
@if(Auth::user()->email_verified_at == NULL)
@include('auth.verify')
@else
<section class="main_container">
    <h1 class="section_name" id="featured">Featured</h1>
    @include('firstcontroller._chansons')
    @include('firstcontroller._playlists')
</section>
@endif
@endauth

@endsection
