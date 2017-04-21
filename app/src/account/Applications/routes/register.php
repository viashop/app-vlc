<?php

Route::name('register')->get('/', 'RegisterController@register');
Route::name('register.post')->post('/post', 'RegisterController@registerPost');
