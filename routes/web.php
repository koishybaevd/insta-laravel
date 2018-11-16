<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/avatar', function() {
    return view('auth/avatar');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}', 'UserController@show');

Route::resource('posts', 'PostController');
Route::get('/posts/getImage/{img_src}', 'PostController@getImage')->name('getImage');