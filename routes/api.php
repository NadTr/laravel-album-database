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

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


//Albums
Route::get('/albums', 'AlbumController@index')->name('albums.index');

Route::post('/albums', 'AlbumController@store')->name('albums.store');

Route::get('/search', 'AlbumController@search')->name('albums.search');

Route::get('/albums/{album}', 'AlbumController@show')->name('albums.show');

Route::put('/albums/{album}', 'AlbumController@update')->name('albums.update');

Route::delete('/albums/{album}', 'AlbumController@destroy')->name('albums.destroy');
