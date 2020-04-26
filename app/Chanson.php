<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    protected $table ="chanson";

    public function utilisateur(){
        return $this->belongsTo("App\User", "utilisateur_id");
        //SELECT $ FROM users WHERE id=?
        //et le ? est remplacé par le $this->user_id
    }

    public function playlists() {
        return $this->belongsToMany('App\Playlist', 'contient', 'chanson_id', 'playlist_id');
    }

    public function chansonBelongPlaylist($idPlaylist,$idChanson){
        //A quelle(s) playlist(s) appartient la chanson
        $playlist = Playlist::find($idPlaylist);
        $exists = $playlist->chansons()->where('chanson.id', $idChanson)->exists();
        return $exists;
    }

    ///////////////////////////////////////////
    public function likesOnChanson(){
        //Nombre de LIKE par chanson
        //SELECT * FROM likes 
        //JOIN chanson ON chanson_id=chanson.id
        //JOIN users ON utilisateur_id=users.id
        //WHERE ...
        return $this->belongsToMany('App\User', 'likes', 'chanson_id', 'utilisateur_id');
    } 

}