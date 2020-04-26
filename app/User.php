<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\InvoicePaid;


class User extends Authenticatable 
//implements MustVerifyEmail

{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    ///////////////////////////////////////////
    public function chansons() {
        // Association chanson avec un utilisateur
        return $this->hasMany("App\Chanson", "utilisateur_id");
    }
    public function playlists() {
        // Association playlist avec un utilisateur
        return $this->hasMany("App\Playlist", "utilisateur_id");
    }

    ///////////////////////////////////////////
    public function jeLesSuis(){
        return $this->belongsToMany("App\User", "suit", "suiveur_id", "suivi_id");
        //SELECT * FROM users JOIN connexion on suivi_id=users.id WHERE  suiveur_id=$this->>$id
    }
    public function ilsMeSuivent(){
        return $this->belongsToMany("App\User", "suit", "suivi_id", "suiveur_id");
    }  

    public function followings(){
        return $this->belongsToMany("App\User", 'suit', 'suiveur_id', 'suivi_id');
    }
    public function followers(){
        return $this->belongsToMany("App\User", 'suit', 'suivi_id', 'suiveur_id');
    }

    ///////////////////////////////////////////
    public function chansonsDelete() {
        // Association chanson avec un utilisateur
        return $this->belongsToMany('App\User', 'chanson', 'utilisateur_id', 'id');
    }
    public function playlistsDelete() {
        // Association playlist avec un utilisateur
        return $this->belongsToMany("App\User","playlist", "utilisateur_id", "id");
    }
}
