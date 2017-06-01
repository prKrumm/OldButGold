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

Auth::routes();

Route::get('/experten', 'ExpertenController@index');

Route::get('/treffpunkt', 'TreffpunktController@index');

Route::get('/treffpunkt/frage', 'TreffpunktController@frage');

Route::get('/treffpunkt/id/{id}', 'TreffpunktController@show');

Route::get('/ersatzteil', 'ErsatzteilController@getErsatzteilList');

Route::get('/ersatzteil/frage', 'ErsatzteilController@frage');

Route::get('/ersatzteil/id/{id}', 'ErsatzteilController@show');

Route::get('/profil', 'ProfilController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/registrierung', 'RegistrierungController@index');

Route::get('/tour', 'StaticController@tour');

Route::get('/kontakt', 'StaticController@kontakt');

Route::get('/ueberuns', 'StaticController@ueberuns');

Route::get('/datenschutz', 'StaticController@datenschutz');

Route::get('/impressum', 'StaticController@impressum');