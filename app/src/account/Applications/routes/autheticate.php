<?php

Route::name('autheticate')->get('/', 'AutheticateController@index');
Route::name('autheticate.post')->post('/post', 'AutheticateController@authenticate');