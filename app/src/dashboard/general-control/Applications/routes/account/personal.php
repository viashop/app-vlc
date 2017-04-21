<?php

Route::name('control.users.personal.read')->get('/', '\Account\PersonalController@read');
Route::name('control.users.personal.read.post')->post('/', '\Account\PersonalController@updatePost');
