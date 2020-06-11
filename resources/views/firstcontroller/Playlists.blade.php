@extends('layouts.template')
@section('content')
<section class="playlist main_container">
    @auth

    <div class="playlist_item background">
        <img class="playlist_image" src="{{$playlist->image}}" alt="{{$playlist->image}}" />
        <div>
            <h2>{{$playlist->nom}}</h2>
            <span>Playlist by
                <a class="artiste" href="/utilisateur/{{$playlist->utilisateur->id}}"
                    data-pjax><b>{{$playlist->utilisateur->name}}</b></a>
            </span>
            @if($playlist->utilisateur->id == Auth::id())
            <a data-pjax-toggle class="btn btn_danger" href="/delete/playlist/{{$playlist->id}}">Delete playlist</a>
            @endif
        </div>
    </div>

    <div class="playlist_songs">
        @if(!$playlist->musicPlaylist($playlist->id))
        <p>
            <h1>No song yet</h1>
        @else
            @include('firstcontroller._chansons', ['chansons'=> $playlist->chansons])
        @endif
    </div>
    @endauth
</section>
@endsection
