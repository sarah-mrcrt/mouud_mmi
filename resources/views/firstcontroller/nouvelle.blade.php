@extends('layouts.template')

@section('content')
{{-- <section class="main_container"> --}}
<div class="container newSong">
    <div class="row justify-content-center align-self-center">
        <div class="col-md-6 background">
            <div class="text-center">
                <h3 class="card-header">{{ __('Upload a song') }}
            </div>
            <div class="card-body">
                <form action="/chanson/create" data-pjax class="md-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="validate-input newPlaylist_name">
                            <input class="form-control account" type="text" name="name" required
                                placeholder="Song name *" value='{{old('nom')}}'
                                required />
                            <span class="symbol-account">
                                <i class="fas fa-headphones-alt"></i>
                            </span>
                        </div>
                        <div class="validate-input upload upload_audio">
                            <label class="btn audio_upload"><i class=" fa fa-music"></i>&nbsp; Song file *</label>
                            <input class="" type="file" name="song" required value='{{old('url')}}'
                                accept="audio/*" />
                        </div>

                        <div class="validate-input upload">
                            <label class="btn image_upload"><i class="fas fa-file-image">&nbsp;</i> Song cover</label>
                            <input name="cover" onchange="readURL(this);" class="image_upload" type="file" value='{{old('image')}}' accept="image/*" />
                            <img id="image_preview" alt="your image" src="/uploads/default/default-music.png" />
                        </div>
                        <div class="select_style">
                            <select type="text" name="style" value="{{old('style')}}" required>
                                <option selected disabled hidden value="">Choose a style</option>
                                {{-- <option value="Custom">Custom</option> --}}
                                <option value="No style">No style</option>
                                <option value="Acoustic">Acoustic</option>
                                <option value="Blues">Blues</option>
                                <option value="Country">Country</option>
                                <option value="Electro">Electro/Dance</option>
                                <option value="Folk">Folk</option>
                                <option value="Funk">Funk</option>
                                <option value="Hip-Hop">Hip-Hop</option>
                                <option value="Latina">Latina</option>
                                <option value="Metal">Metal</option>
                                <option value="Pop">Pop</option>
                                <option value="Rap">Rap</option>
                                <option value="Reggae">Reggae</option>
                                <option value="Rock">Rock</option>
                                <option value="R&B">R&B</option>
                                <option value="Soul">Soul</option>
                                <option value="World">World</option>
                            </select>
                        </div>

                        <div style="margin: auto; width: 100%;" class="buttons">
                            <input class="btn btn_antiDanger" type="button" name="cancel" value="Cancel"
                                onclick="window.location='/'" />
                            <input class="btn btn_fondOrange" type="submit" name="submit" value="Save" />
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
