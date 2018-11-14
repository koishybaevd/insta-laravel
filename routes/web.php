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
    $img = Image::make('https://images.pexels.com/photos/34950/pexels-photo.jpg')->resize(100, 100);

    return $img->response('jpg');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
