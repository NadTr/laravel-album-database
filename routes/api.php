<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Users
Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');

Route::post('/logout', 'AuthController@logout');


//Albums
Route::get('/albums', 'albumController@all')->name('albums.all');

Route::post('/albums', 'albumController@store')->name('albums.store');

Route::get('/albums/{album}', 'albumController@show')->name('albums.show');

Route::put('/albums/{album}', 'albumController@update')->name('albums.update');

Route::delete('/albums/{album}', 'albumController@destory')->name('albums.destroy');
