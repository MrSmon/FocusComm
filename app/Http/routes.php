<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('actualites', 'ActualiteController');

Route::get('/auth/login', 'AuthController@login'); 

Route::group(['middleware' => ['auth']], function () {    
        Route::get('/auth/logout', 'AuthController@logout');
});
Route::get('/user/', 'UserController@index');            
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/', 'UserController@store');
Route::put('/user/{id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@destroy');  

