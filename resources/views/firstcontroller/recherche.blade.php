@extends('layouts.template')

@section('content')
<section class="search main_sidebar main_container">
    <div class="background search_sidebar">
        <ul class="nav flex-column justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active linkOrange_hover" id="pills-all-tab" data-toggle="pill" href="#pills-all"
                    role="tab" aria-controls="pills-all" aria-selected="true">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linkOrange_hover" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                    role="tab" aria-controls="pills-profile" aria-selected="false">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link linkOrange_hover" id="pills-songs-tab" data-toggle="pill" href="#pills-songs"
                    role="tab" aria-controls="pills-songs" aria-selected="false">Songs</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            @include('firstcontroller._users')
            @include('firstcontroller._chansons', ['chansons'=>$chansons])
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @include('firstcontroller._users')
        </div>
        <div class="tab-pane fade" id="pills-songs" role="tabpanel" aria-labelledby="pills-songs-tab">
            @include('firstcontroller._chansons', ['chansons'=>$chansons])
        </div>
    </div>
</section>
@endsection
