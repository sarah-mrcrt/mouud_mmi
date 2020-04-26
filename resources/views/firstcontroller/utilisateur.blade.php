@extends('layouts.template')
@section('content')
<section class="main_sidebar main_container">
    @auth
    <div class="profile_sidebar background" style="overflow: hidden;">
        <div class="avatar">
            @if(Auth::id() == $utilisateur->id)
            <button data-toggle="modal" data-target="#avatarModal">
                <div class='avatar_upload'>
                    <img class="avatar_image" src="/uploads/avatars/{{$utilisateur->avatar}}"
                        alt="avatar_{{$utilisateur->name}}" />
                    <i class="fa fa-camera"></i>
                </div>
            </button>
            <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="avatarModalLabel">Update avatar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body upload">
                            <form action="/update/utilisateur/{{$utilisateur->id}}" method="post"
                                enctype="multipart/form-data" data-pjax>
                                @csrf
                                <label class="btn image_upload">Select a file</label>
                                <input type='file' onchange="readURL(this);" name="avatar" accept="image/*" />
                                <img class="avatar_preview" id="image_preview"
                                    src="/uploads/avatars/{{$utilisateur->avatar}}" alt="your image" />
                                <input type="submit" class="btn btn_fondOrange" value="Submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class='avatar_upload'>
                <img class="avatar_image" src="/uploads/avatars/{{$utilisateur->avatar}}"
                    alt="avatar_{{$utilisateur->name}}" />
            </div>
            </button>
            @endif
        </div>



        <div class="informations">
            <ul>
                <li>
                    <h4>{{$utilisateur->name}}</h4>
                </li>
                <li class="follow">
                    @if(Auth::id() != $utilisateur->id)
                    @if(Auth::user()->jeLesSuis->contains($utilisateur->id))
                    <a class="btn btn_bordureOrange" href="/suivre/{{$utilisateur->id}}" data-pjax-toggle>UnFollow</a>
                    @else
                    <a class="btn btn_fondOrange" href="/suivre/{{$utilisateur->id}}" data-pjax-toggle>Follow</a>
                    @endif
                    @endif
                </li>
                <li class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">

                    <a class="nav-link linkOrange_hover" data-toggle="tab" href="#followersTabs"
                        aria-selected="true">{{$utilisateur->ilsMeSuivent()->count()}} Followers</a>
                    <a class="nav-link linkOrange_hover" data-toggle="tab" href="#followingsTabs"
                        aria-selected="true">{{$utilisateur->jeLesSuis()->count()}} Following</a>

                    <a class="nav-link active linkOrange_hover" data-toggle="tab" href="#songsTabs"
                        aria-selected="true">{{$utilisateur->chansons()->count()}} Songs</a>
                    <a class="linkOrange_hover nav-link" data-toggle="tab" href="#playlistsTabs"
                        aria-selected="false">{{$utilisateur->playlists()->count()}} Playlists</a>
                </li>
            </ul>
        </div>
        @if(Auth::id() == $utilisateur->id)
        <div class="delete">
            <button type="button" class="btn btn_danger" data-toggle="modal" data-target="#deleteModal">Delete my
                account
            </button>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete my account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Are you sure ?</h6>
                            <p>If you delete your account, this will result in the deletion of all your songs and
                                playlists. </p>
                            <button type="button" class="btn btn_antiDanger" data-dismiss="modal">Cancel</button>
                            <a class="btn btn_danger" href="/delete/utilisateur/{{$utilisateur->id}}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="songsTabs" role="tabpanel" aria-labelledby="songsTabs-tab">
            {{-- <h1>Songs</h1> --}}
            {{-- <a data-pjax href="/chanson/nouvelle">New song</a> --}}
            @include('firstcontroller._chansons', ['chansons'=> $utilisateur->chansons])
        </div>
        <div class="tab-pane fade" id="playlistsTabs" role="tabpanel" aria-labelledby="playlistsTabs-tab">
            {{-- <h1>Playlists</h1> --}}
            {{-- <a data-pjax href="/playlist/nouvelle">New playlist</a> --}}
            @include('firstcontroller._playlists', ['playlists'=> $utilisateur->playlists])
        </div>

        <div class="tab-pane fade search" id="followersTabs" role="tabpanel" aria-labelledby="followersTabs-tab">
            <div class="serach_users">
                @foreach(Auth::user()->followers as $follower)
                <div class="users_profile background">
                    <div>
                        <a data-pjax href="/utilisateur/{{ $follower->id }}">
                            <img class="avatar_search" src="/uploads/avatars/{{$follower->avatar}}" alt="{{ $follower->id }}" />
                        </a>
                    </div>
                    <div>
                        <a class="artiste" href="/utilisateur/{{$follower->id}}" data-pjax><b>{{ $follower->name }}</b></a>
                        <p>{{$follower->ilsMeSuivent()->count()}} <i class="fas fa-user-friends"></i></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="tab-pane fade search" id="followingsTabs" role="tabpanel" aria-labelledby="followingsTabs-tab">
        <div class="serach_users">
                @foreach(Auth::user()->followings as $following)
                <div class="users_profile background">
                    <div>
                        <a data-pjax href="/utilisateur/{{ $following->id }}">
                            <img class="avatar_search" src="/uploads/avatars/{{$following->avatar}}" alt="{{ $following->id }}" />
                        </a>
                    </div>
                    <div>
                        <a class="artiste" href="/utilisateur/{{$following->id}}" data-pjax><b>{{ $following->name }}</b></a>
                        <p>{{$following->ilsMeSuivent()->count()}} <i class="fas fa-user-friends"></i></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    @endauth
</section>
@endsection
