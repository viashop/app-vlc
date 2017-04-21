<?php

Route::name('reset.password')->get('/{token?}', 'ResetPasswordController@reset');
Route::name('reset.password.post')->post('/{token}', 'ResetPasswordController@resetPost');