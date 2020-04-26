<section class="chansons d-flex main_container">
    @foreach ($playlists as $p)
<div class="nav_playlists">
    <div style="overflow: hidden;
    width: 15rem;">
        <div class="album songs">
            <img class="album album_playlist" src="{{$p->image}}" class="image-playlist" />
            <a data-pjax href="/playlist/{{$p->id}}">
                <div class="overlay">
                    <i class="fas fa-eye"></i>
                </div>
            </a>
    </div>


    <div class="items">
        <a data-pjax href="/utilisateur/{{$p->utilisateur->id}}"><img class="avatar_icon"
                src="/uploads/avatars/{{$p ->utilisateur->avatar}}" alt="{{$p->utilisateur->id}}" /></a>
        <div>
            <a data-pjax class="linkOrange_hover playlists" href="/playlist/{{$p->id}}"><b>{{$p->nom}}</b></a>
            <a data-pjax class="artiste" href="/utilisateur/{{$p->utilisateur->id}}">{{$p ->utilisateur->name}}</a>
        </div>
    </div>
    {{-- @if($p->utilisateur->id == Auth::id())
            <a class="delete" data-pjax-toggle href="/delete/playlist/{{$p->id}}">
            </a><i class="fas fa-trash"></i>
            @endif --}}
    {{-- @if(!$p->musicPlaylist($p->id))
            <span>Pas de chansons dans cette playlist</span>
            @else
                <span>Chansons de la playlist</span>
            @include('firstcontroller._chansons', ['chansons'=> $p->chansons])
            @endif --}}

</div>
</div>
@endforeach
</section>
