@extends('layouts.template')
@section('content')
<div class="container newPlaylist">
    <div class="row justify-content-center align-self-center">
        <div class="col-md-6 background">
            <div class="text-center">
                <h3 class="card-header">{{ __('Create a playlist') }}
            </div>
            <div class="card-body">
                <form action="/playlist/create" data-pjax class="md-form" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="validate-input newPlaylist_name">
                            <input class="form-control account" type="text" name="name" placeholder="Playlist name *"
                                value='{{old('nomPlaylist')}}' required />
                            <span class="symbol-account">
                                <i class="fas fa-headphones-alt"></i>
                            </span>
                        </div>
                        <div class="validate-input upload">
                            <label class="btn image_upload"><i class="fas fa-file-image">&nbsp; </i>Playlist
                                cover</label>
    
                            <input class="image_upload" type="file" name="cover" onchange="readURL(this);" value='{{old('image')}}'
                                accept="image/*" />
                            <img id="image_preview" alt="your image" src="/uploads/default/default-playlist.png" />
                        </div>

                        <div style="margin: auto;" class="buttons">
                            <input class="btn btn_antiDanger" type="button" name="cancel" value="Cancel"
                                onclick="window.location='/'" />

                            <input class="btn btn_fondOrange" type="submit" value="Submit" />
                        </div>
                    </div>
                </form>

                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
