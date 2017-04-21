<?php

Route::name('recover')->get('/', 'RecoverPasswordController@recover');
Route::name('recover.post')->post('post', 'RecoverPasswordController@recoverPost');
Route::name('recover.notice')->get('aviso', 'RecoverPasswordController@notice');