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

Route::group([
     'prefix' => 'v1',
], function () {
     Route::get('/users', 'UsersController@index');
     Route::post('/users/save', 'UsersController@store');
     Route::get('/users/{id}', 'UsersController@show');
     Route::get('/users/{id}/pets', 'UsersController@pets');
     Route::delete('/users/{user_id}/pets/{pet_id}', 'UsersController@destroy');
});
