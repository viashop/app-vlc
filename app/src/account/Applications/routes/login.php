<?php

Route::name('login')->get('/', 'LoginController@index');
Route::name('login.post')->post('/post', 'LoginController@authenticate');