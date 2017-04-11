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

Route::get('/home', 'HomeController@index');

Route::get('/experten', 'ExpertenController@index');

Route::get('/treffpunkt', 'TreffpunktController@index');

Route::get('/ersatzteil', 'ErsatzteilController@index');

Route::get('/profil', 'ProfilController@index');

Route::get('/registrierung', 'RegistrierungController@index');

Route::get('/tour', 'TourController@index');