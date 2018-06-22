<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'WelcomeController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('bijos', 'BijosController', ['only' => ['create']]);
});

Route::get('/items', 'ItemController@index');
Route::match(['GET', 'POST'], '/create', 'ItemController@create');

Route::get('/bijo', 'BijosController@index');

Route::resource('bijos', 'BijosController');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('bijos', 'BijosController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('bijos', 'BijosController', ['only' => ['create', 'show']]);
    Route::post('like', 'BijoUserController@like')->name('bijo_user.like');
    Route::delete('like', 'BijoUserController@dont_like')->name('bijo_user.dont_like');
    Route::resource('users', 'UsersController', ['only' => ['show']]);
});
