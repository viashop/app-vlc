<?php

Route::name('lock')->get('/', 'LockController@lock');
Route::name('lock.post')->post('/post', 'LockController@getPostLock');