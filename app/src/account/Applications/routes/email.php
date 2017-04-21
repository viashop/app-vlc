<?php

Route::name('email.confirm')->get('/{token?}', 'EmailConfirmController@confirm');
Route::name('email.confirm.post')->post('/{token}', 'EmailConfirmController@confirmPost');
