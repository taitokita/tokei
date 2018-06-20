<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'WelcomeController@index');
