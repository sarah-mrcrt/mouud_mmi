<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';

    public function utilisateur(){
        return $this->belongsTo("App\User", "utilisateur_id");
    }
    
    public function chansons() {
        return $this->belongsToMany("App\Chanson", 'contient', 'playlist_id', 'chanson_id');
    }

    public function musicPlaylist($idPlaylist){
        //S'il exite une chanson dans la playlist
        $playlist = Playlist::find($idPlaylist);
        $exists = $playlist->chansons()->exists();
        return $exists;
    }
}
