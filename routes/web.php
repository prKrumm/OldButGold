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

Auth::routes();


Route::get('/experten', 'ExpertenController@index');


//TREFFPUNKT
Route::get('/treffpunkt', 'TreffpunktController@index');
Route::get('/treffpunkt/create', 'TreffpunktController@create');
Route::get('/treffpunkt/remove', 'TreffpunktController@remove');
Route::post('/treffpunkt/store', 'TreffpunktController@store');
Route::get('/treffpunkt/id/{id}', 'TreffpunktController@show');
//Route::post('/treffpunkt/storeAntwort', 'TreffpunktController@storeTreffpunktAntwort');


//ERSATZTEIL
Route::get('/ersatzteil', 'ErsatzteilController@index');
Route::get('/ersatzteil', 'ErsatzteilController@index');
Route::get('/ersatzteil/create', 'ErsatzteilController@create');
Route::get('/ersatzteil/remove', 'ErsatzteilController@remove');
Route::post('/ersatzteil/store', 'ErsatzteilController@store');
Route::get('/ersatzteil/id/{id}', 'ErsatzteilController@show');


//PROFIL
Route::get('/profil', 'ProfilController@index');


//ADMIN
Route::get('/admin', 'AdminController@index');


//REGISTER
Route::post('/register', 'Auth\RegisterController@register');


//STATISCH
Route::get('/', function () {return view('welcome');});
Route::get('/tour', 'StaticController@tour');
Route::get('/kontakt', 'StaticController@kontakt');
Route::post('/kontakt/kontaktformular', 'StaticController@kontaktformular');
Route::get('/ueberuns', 'StaticController@ueberuns');
Route::get('/datenschutz', 'StaticController@datenschutz');
Route::get('/impressum', 'StaticController@impressum');


//AJAX
Route::get('/modelle', 'ErsatzteilTreffpunktController@modelle');
Route::get('/treffpunkt/fragen', 'TreffpunktController@fragen');
Route::get('/ersatzteil/fragen', 'ErsatzteilController@fragen');
Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'ErsatzteilTreffpunktController@autocomplete'));
Route::get('/showAllThemes', array('as' => 'showAllThemes', 'uses'=>'ErsatzteilTreffpunktController@showAllThemes'));

