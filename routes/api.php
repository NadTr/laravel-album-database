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


//if authenticated
Route::middleware('auth:api')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    //Albums

    Route::get('/albums', 'AlbumController@index')->name('albums.index');
    Route::post('/album', 'AlbumController@store')->name('albums.store');
    Route::get('/search', 'AlbumController@search')->name('albums.search');
    Route::get('/album', 'AlbumController@show')->name('albums.show');
    Route::put('/album', 'AlbumController@update')->name('albums.update');
    Route::delete('/album', 'AlbumController@destroy')->name('albums.destroy');
});

//Route login
Route::post('login', 'AuthController@login');
