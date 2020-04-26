<div class="serach_users">
    @foreach ($utilisateurs as $u)
    <div class="users_profile background">
        <div>
            <a data-pjax href="/utilisateur/{{$u->id}}">
                <img class="avatar_search" src="/uploads/avatars/{{$u->avatar}}" alt="{{$u->id}}" />
            </a>
        </div>
        <div>
            <a class="artiste" href="/utilisateur/{{$u->id}}" data-pjax><b>{{$u->name}}</b></a>
            <p>{{$u->ilsMeSuivent()->count()}} <i class="fas fa-user-friends"></i></p>
        </div>
    </div>
    @endforeach
</div>
