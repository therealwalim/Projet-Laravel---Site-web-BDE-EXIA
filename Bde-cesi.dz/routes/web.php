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


Route::get('/', function () {
    return view('welcome'); 
});

Route::get('about', function () {
    return view('login'); 
});



Auth::routes();

Route::get('/inscription', 'HomeController@inscription')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produits', 'Controllerproduit@index')->name('produit');

Route::resource('produit', 'Controllerproduit');
Route::resource('evenement', 'EvenementsController');
Route::resource('idee', 'IdeeController');

Route::post('/likec', 'EvenementsController@likec')->name('likec');
Route::post('/like', 'EvenementsController@like')->name('like');
Route::post('/enregistrement', 'EvenementsController@enregistrement')->name('enregistrement');
Route::post('/vote', 'IdeeController@vote')->name('vote');
Route::post('/delvote', 'EvenementsController@delvote')->name('delvote');
Route::post('/delevent', 'EvenementsController@delevent')->name('delevent');
Route::post('/ajoutimage', 'EvenementsController@ajoutimage')->name('ajoutimage');
Route::post('/delp', 'EvenementsController@delp')->name('delp');


Route::post('/delcom', 'EvenementsController@delcom')->name('delcom');

Route::get('/download/{id}', 'EvenementsController@download')->name('download');

Route::post('/commenter', 'EvenementsController@commenter')->name('commenter');
Route::post('/add', 'Controllerproduit@add')->name('add');
Route::get('/panier', 'Controllerproduit@panier')->name('panier');
Route::get('/notification', 'Controllerproduit@notification')->name('notification');

Route::get('/pasee', 'EvenementsController@pasee')->name('pasee');
Route::get('/future', 'EvenementsController@avenir')->name('future');


/**              Ajax    filtre  */

Route::get('/produits', 'ControllerProduit@index')->name('produit');
Route::get('/produitsCat','ControllerProduit@produitsCat');
Route::post('/fetch','ControllerProduit@fetch');

Route::resource('produits', 'ControllerProduit');



Route::get('/download', 'EvenementsController@downloads')->name('download');
