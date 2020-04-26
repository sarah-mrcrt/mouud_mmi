<div class="chansons d-flex">
    @foreach ($chansons as $c)
    @auth
    <div style="overflow: hidden;
    width: 12rem;">
        <div class="songs">
            <img src="{{$c->image}}" alt="song_{{$c->id}}" class="album album_song">
            <span class="style">{{$c->style}}</span>

            <div class="overlay">
                <a href="#" class="chanson" data-file="{{$c->url}}"><i class="fas fa-play"></i>
                </a>
                <div class="like">
                    @if(!$c->likesOnChanson->contains($c->id))
                    <a href="/like/{{$c->id}}" data-pjax-toggle>{{$c->likesOnChanson()->count()}}&nbsp;<i
                            class="far fa-heart"></i></a>
                    @else
                    <a data-pjax-toggle href="/like/{{$c->id}}">{{$c->likesOnChanson()->count()}}&nbsp;<i
                            class="fas fa-heart"></i></a>
                    @endif
                </div>
                <button type="button" class="addP" data-toggle="modal" data-target="#add"><i
                        class="fas fa-plus-square"></i></button>

                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Save in ...</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if($c->utilisateur->id == Auth::id())
                                <a class="modal_btn btn btn_danger" data-pjax-toggle href="/delete/chanson/{{$c->id}}">Delete</a>
                                @endif
                                @foreach(Auth::user()->playlists as $p)
                                <hr>
                                @if(!$c->chansonBelongPlaylist($p->id,$c->id))
                                <a class="modal_btn check" data-pjax-toggle href="/ajouterPlaylist/{{$p->id}}/{{$c->id}}"><i
                                        class="far fa-square"></i> {{$p->nom}} </a>
                                @else
                                <a class="modal_btn check" data-pjax-toggle
                                    href="/delete/chanson/playlist/{{$p->id}}/{{$c->id}}"><i
                                        class="far fa-check-square"></i> {{$p->nom}}</a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="items">

            <a data-pjax href="/utilisateur/{{$c->utilisateur->id}}">
                <img class="avatar_icon" src="/uploads/avatars/{{$c ->utilisateur->avatar}}"
                    alt="{{$c->utilisateur->id}}" />
            </a>
            <div>
                <a href="#" class="linkOrange_hover chanson" data-file="{{$c->url}}">
                    <b>{{$c->nom}}</b></a>
                <a data-pjax class="artiste" href="/utilisateur/{{$c->utilisateur->id}}">{{$c ->utilisateur->name}}</a>
            </div>
        </div>
    </div>
    {{-- @if($c->utilisateur->id == Auth::id())
                <a class="delete" data-pjax-toggle href="/delete/chanson/{{$c->id}}">Delete song</a>
    @endif
    @foreach(Auth::user()->playlists as $p)
    @if(!$c->chansonBelongPlaylist($p->id,$c->id))
    <a data-pjax-toggle href="/ajouterPlaylist/{{$p->id}}/{{$c->id}}"> {{$p->nom}} </a>
    @else
    <a data-pjax-toggle href="/delete/chanson/playlist/{{$p->id}}/{{$c->id}}">Delete from {{$p->nom}}</a><br />
    @endif
    @endforeach --}}
    @endauth
    @endforeach
</div>
