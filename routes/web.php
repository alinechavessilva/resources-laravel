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


Route::get('users', 'UserController@index');

Route::resource('resources','ResourceController');

Route::resource('flowresources','FlowResourcesController');

Route::get('flowresources/{id}/createFlow','FlowResourcesController@createFlow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
