<?php
// Supprimer file Chanson
// Remplacer l'avatar upload
// Modification (profile, chanson, playlist)
// Revoir notifications
namespace App\Http\Controllers;

use App\Chanson;
use App\User;
use App\Playlist;
use App\Like;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;

use Image;
//use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Foundation\Auth\User as Authenticatable;

//phpinfo();

class FirstController extends Controller {

    ///////////////////////////////////////////////////////
    public function index(){
        //Page d'accueil
        $chansons = Chanson::all()->sortByDesc('id')->take(4); //Récuperer toute les chansons
        $playlists = Playlist::all()->sortByDesc('id')->take(3);
        $utilisateur = User::all();
        return view("firstcontroller.index", ["chansons" => $chansons], ["playlists" => $playlists],["utilisateur" => $utilisateur]);
        //Je retourne la vue ("fichierDeLaVue.NomDuFichier", ["variableDonnée" => Variable-A-Utiliser]);
    }

    ///////////////////////////////////////////////////////
    public function utilistateur($id){
        //Page d'un utlisateur
        $u = User::findOrFail($id);
        return view("firstcontroller.utilisateur", ['utilisateur'=>$u]);
    }
    public function updateAvatar(Request $request){
        //Modifier l'avatar d'un utilisateur
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . ($avatar->getClientOriginalExtension());
            // $file->move('\modo\images',$file->getClientOriginalName());
            
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));
            $utilisateur = Auth::user();
            $utilisateur->avatar = $filename;
            $utilisateur->save();
        }
        return redirect()->back();
    }
    public function deleteUtilisateur($id) {
        $utilisateur=User::findOrFail($id);
        if($id != Auth::id() || $id == false)
            abort(404);
        // Supprimer un utilisateur et ses chansons
        if($utilisateur){
            $utilisateur->chansonsDelete()->sync([]);
            $utilisateur->playlistsDelete()->sync([]);
            $utilisateur->delete($utilisateur);
            File::deleteDirectory(public_path('/uploads/'.Auth::id()));
            return redirect("/");
        }
    }

    ///////////////////////////////////////////////////////
    public function nouvellechanson(){
        //Page dune nouvelle chanson
        return view("firstcontroller.nouvelle");
    }
    public function creerchanson(Request $request){
        //Validation du formulaire -> Côté Client
        //https://laravel.com/docs/5.8/validation#available-validation-rules
        $request->validate([
            'name' => 'required|max:20|min:4',
            'song' => 'required|file|mimetypes:audio/mpeg',
            'cover' => 'file|mimes:jpg,jpeg,png,bmp,tiff|max:300',
            'style' => 'required|max:255|min:2',
        ]);
        //Si le formulaire est valide j'effectue la création d'une nouvelle chanson
        //Créer un fichier pour mettre chanson pour chaque utilisateur
        $name = $request->file('song')->hashName();
        $request->file('song')->move("uploads/".Auth::id(), $name);
        if($request->file('cover') != null){
            $name2 = $request->file('cover')->hashName();
            $request->file('cover')->move("uploads/".Auth::id(), $name2);
        }
        //Je crée une nouvelle chanson
        $c = new Chanson();
        //Donne moi :
        $c->nom = $request->input('name');
        $c->url =('/uploads/'.Auth::id().'/'.$name);
        $c->style = $request->input('style');
        if($request->file('cover') != null){
            $c->image = ('/uploads/'.Auth::id().'/'.$name2);
        }
        // A qui il appartient ?
        $c->utilisateur_id = Auth::id();
        $c->save(); // INSERT INTO chansons VALUES (Null,...)
        //Je sauvegarde
        return redirect("utilisateur/".Auth::id())->with('toastr', ['statut' => 'success', 'message' => 'Song added']);
        //dd($_POST);
    }
    public function deleteChanson($idChanson) {
        $chanson=Chanson::findOrFail($idChanson);
        if($chanson->utilisateur_id != Auth::id() ||$idChanson == false)
            abort(404);
        // Supprimer une chanson
        if($chanson){
            $chanson->playlists()->sync([]);
            $chanson->delete($chanson);
            // unlink(storage_path('/uploads/'.Auth::id().'/'. $chanson->url));
            // Storage::disk('s3')->delete('/uploads/'.Auth::id().'/'. $chanson->url);
            // Storage::disk('public')->delete('/uploads/'.Auth::id().'/'. $chanson->url);
            // File::delete(public_path().'/uploads/'.Auth::id());
            // File::delete(public_path('/uploads/'.Auth::id()));
            // File::delete('/uploads/'.Auth::id().'/'. $chanson->url);
            // Storage::delete(public_path('/uploads/'.Auth::id().'/'. $chanson->url));
            return redirect('/')->with('toastr', ['statut' => 'success', 'message' => 'Deleted song']);
        }
    }

    ///////////////////////////////////////////////////////
    public function nouvellePlaylist(){
        //Page d'une playlist
        return view("firstcontroller.newPlaylist");
    }
    public function Playlist($id){
        //Page d'un utlisateur
        $playlist = Playlist::findOrFail($id);
        return view("firstcontroller.Playlists", ['playlist'=>$playlist]);
    }
    public function creerPlaylist(Request $request){
        $request->validate([
            'name' => 'required|max:20|min:3',
            'cover' => 'file|mimes:jpg,jpeg,png,bmp,tiff|max:300',
        ]);
        if($request->file('cover') != null){
            $name2 = $request->file('cover')->hashName();
            $request->file('cover')->move("uploads/".Auth::id(), $name2);
        }
        // $name = $request->file('chanson')->hashName();
        // $request->file('chanson')->move("uploads/".Auth::id(), $name);
        $p = new Playlist();
        $p->nom = $request->input('name');
         if($request->file('cover') != null){
            $p->image = ('/uploads/'.Auth::id().'/'.$name2);
        }
        $p->utilisateur_id = Auth::id();
        $p->save();
        return redirect('/')->with('toastr', ['statut' => 'success', 'message' => 'Playlist created']);
    }

    public function addPlaylist($idPlaylist,$idChanson){
        $playlist = Playlist::findOrFail($idPlaylist);
        if($playlist->utilisateur_id != Auth::id() || $playlist == false ){
            abort(403);
        }
        $playlist->chansons()->syncWithoutDetaching($idChanson);
        return redirect()->back()->with('toastr', ['statut' => 'success', 'message' => 'Song added to the playlist']);
    }
    public function deleteChansonFromPlaylist($idPlaylist,$idChanson){
        $chanson = Chanson::findOrFail($idChanson);
        $playlist = Playlist::find($idPlaylist);
        if($playlist == false || $chanson == false || $playlist->utilisateur_id != Auth::id()){
            abort(403);
        }
        $playlist->chansons()->detach($idChanson);
        return redirect()->back()->with('toastr', ['statut' => 'success', 'message' => $chanson->nom . ' deleted from the playlist']);
    }
    public function deletePlaylist($idPlaylist){
        $playlist=Playlist::findOrFail($idPlaylist);
        //$playlist->utilisateur_id != Auth::id() 
        if($idPlaylist == false)
            abort(404);
        if($playlist){
            //Supp des tables 'contient' et 'playlist'
            $playlist->chansons()->sync([]);
            $playlist->delete($playlist);
            return redirect('/')->with('toastr', ['statut' => 'success', 'message' => 'Deleted playlist']);
        }
    }
    
    ///////////////////////////////////////////////////////
    public function suivre($id){
        //Suivre une personne
        Auth::user()->jeLesSuis()->toggle($id);
        $user = Auth::user();
        $user->notify(new InvoicePaid(Auth::user()));
        return back();
    }

    ///////////////////////////////////////////////////////
    public function like($idChanson){
        //Aimer une chanson
        $c = Chanson::findOrFail($idChanson);
        $c->likesOnChanson()->toggle(Auth::id());
        $user = Auth::user();
        $user->notify(new InvoicePaid(Auth::user()));
        return back();
        //->with('toastr', ['statut' => 'success', 'message' => 'Liked your song'])
    }

    ///////////////////////////////////////////////////////
    public function recherche($parametre) {
        //Rechercher une chanson ou un utilisateur
        $utilisateur = User::whereRaw("name LIKE CONCAT(?,'%')", [$parametre])->get();
        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?,'%')", [$parametre])->get();
        return view("firstcontroller.recherche", ['utilisateurs' => $utilisateur, 'chansons' => $chansons]);
    }

    ///////////////////////////////////////////////////////
    public function markAsRead(){
        Auth::user()->unReadNotifications->markAsRead();
        return back();
    }
}