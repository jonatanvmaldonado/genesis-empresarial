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
Route::get('/', 'ArticuloController@index');
Route::get('/articulo/{id}', 'ArticuloController@show')->name('articulo.show');
Route::post('/articulo', 'ArticuloController@store')->name('articulo.store');
Route::put('/articulo', 'ArticuloController@update')->name('articulo.update');

Route::post('/comentario', 'ComentarioController@store')->name('comentario.store');
Route::delete('/comentario/{id}', 'ComentarioController@destroy')->name('comentario.destroy');

Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/users/{id}', 'UserController@show')->name('users.show');
Route::put('/users', 'UserController@update')->name('users.update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
