<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Page où se trouve l'ensemble des pages/routes

1 - Créer la route -> public/web.php de forme : Route::NomMéthode('Racine','LieuxFonction@NomDuFichier',);

2 - Créer la fonction associer -> app/Http/Controllers/Auth/FirstController.php

3 - Créer la vue dans le fichier-> resources/views/firstcontroler
*/


//*************** Page d'accueil *************** //
Route::get('/', 'FirstController@index');

//*************** PAGE UTILISATEUR *************** //
//Connexion
Route::get('/home', 'FirstController@index');
//Page d'un utlisateur
Route::get('/utilisateur/{id}', 'FirstController@utilistateur')->where('id','[0-9]+')->middleware('verified')->middleware('auth');
//Modifier un avatar
Route::post('/update/utilisateur/{id}','FirstController@updateAvatar')->where('id','[0-9]+')->middleware('verified')->middleware('auth');
//Supprimer son compte
Route::get('/delete/utilisateur/{id}','FirstController@deleteUtilisateur')->where('id','[0-9]+')->middleware('verified')->middleware('auth');


//*************** CHANSONS *************** //
Route::get('/chanson/nouvelle', 'FirstController@nouvellechanson')->middleware('verified')->middleware('auth');
//Creer une nouvelle chanson, Method POST, donc je ne peux pas l'écrire dans l'url
//Si je suis Conncté, aller sur la page de celle-ci. Sinon, je demande la connexion
Route::post('/chanson/create', 'FirstController@creerchanson')->name('nouvelle')->middleware('verified')->middleware('auth');
//Supprimer une chanson
Route::get('/delete/chanson/{idChanson}','FirstController@deleteChanson')->where('id','[0-9]+')->middleware('verified')->middleware('auth');


//*************** PLAYLISTS *************** //
//Afficher playlist
Route::get('/playlist/nouvelle', 'FirstController@nouvellePlaylist')->middleware('verified')->middleware('auth');
//Creer playlists
Route::post('/playlist/create', 'FirstController@creerPlaylist')->middleware('verified')->middleware('auth');
//Voir les musiques d'une playlist
//Ajouter playlists
Route::get('/ajouterPlaylist/{idPlaylist}/{idChanson}', 'FirstController@addPlaylist')->where('id','[0-9]+')->middleware('verified')->middleware('auth');
//Supprimer playlist
Route::get('/delete/playlist/{idPlaylist}','FirstController@deletePlaylist')->where('id','[0-9]+')->middleware('verified')->middleware('auth');
//Retirer une chanson de la playlist
Route::get('/delete/chanson/playlist/{idPlaylist}/{idChanson}', 'FirstController@deleteChansonFromPlaylist')->where('id','[0-9]+')->middleware('verified')->middleware('auth');
// Afficher page playlist avec ses
Route::get('/playlist/{idPlaylist}', 'FirstController@Playlist')->where('id','[0-9]+')->middleware('verified')->middleware('auth');

//*************** Formulaire de recherche *************** //
Route::get('/recherche/{parametre}','FirstController@recherche')->middleware('verified')->middleware('auth');


//*************** Suivre qq1 *************** //
Route::get('/suivre/{id}', 'FirstController@suivre')->where('id','[0-9]+')->middleware('verified')->middleware('auth');


//*************** Like *************** //
Route::get('/like/{idChanson}', 'FirstController@like')->name('like')->where('idChanson','[0-9]+')->middleware('verified')->middleware('auth');

//*************** Notification *************** //
// Notification a été vu
Route::get('/markAsRead','FirstController@markAsRead')->name('markRead')->middleware('verified')->middleware('auth');


// Auth::routes();
Auth::routes(['verify' => true]);
//->middleware('verified')