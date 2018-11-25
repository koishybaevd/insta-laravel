<?php

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/setprofileimage', function() {
    return view('auth/setprofileimage');
})->name('setProfileImage');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/seacrh', 'SearchController@index')->name('search');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/{user}', 'UserController@show')->name('profile');
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UserController@update')->name('users.update')->middleware('auth');

Route::resource('posts', 'PostController');

Route::get('/getImage/{img_src}', 'ImageController@getImage')->name('getImage');