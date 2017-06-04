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

Route::get('/treffpunkt/create', 'TreffpunktController@create');
Route::post('/treffpunkt/store', 'TreffpunktController@store');

Route::get('/treffpunkt/id/{id}', 'TreffpunktController@show');

Route::get('/ersatzteil', 'ErsatzteilController@index');

Route::get('/ersatzteil/create', 'ErsatzteilController@create');
Route::post('/ersatzteil/store', 'ErsatzteilController@store');

Route::get('/ersatzteil/id/{id}', 'ErsatzteilController@show');

Route::get('/profil', 'ProfilController@index');

Route::get('/admin', 'AdminController@index');

Route::post('/register', 'Auth\RegisterController@register');

Route::get('/tour', 'StaticController@tour');

Route::get('/kontakt', 'StaticController@kontakt');

Route::get('/ueberuns', 'StaticController@ueberuns');

Route::get('/datenschutz', 'StaticController@datenschutz');

Route::get('/impressum', 'StaticController@impressum');

//AJAX

Route::get('/modelle', 'ErsatzteilTreffpunktController@modelle');

Route::get('/autocomplete', array('as' => 'autocomplete', 'uses'=>'ErsatzteilTreffpunktController@autocomplete'));