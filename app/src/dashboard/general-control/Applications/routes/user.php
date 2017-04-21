<?php

Route::name('control.users.admin.read')->get('/', '\User\Admin\UserReadController@read');
Route::name('control.users.admin.read.search')->get('/?search={value}', '\User\Admin\UserReadController@read');
Route::name('control.users.admin.delete')->get('/{id}/remove', '\User\Admin\UserDeleteController@delete')->where('id', '[0-9]+');
Route::name('control.users.admin.update')->get('/{id}/edit', '\User\Admin\UserUpdateController@update')->where('id', '[0-9]+');
Route::name('control.users.admin.update.post')->post('/{id}/edit', '\User\Admin\UserUpdateController@updatePost')->where('id', '[0-9]+');
Route::name('control.users.admin.create')->get('/create', '\User\Admin\UserCreateController@create');
Route::name('control.users.admin.create.post')->post('/create', '\User\Admin\UserCreateController@createPost');
Route::name('control.users.admin.new.password')->get('/{id}/generate/new/password', '\Password\GeneratePasswordController@passwordUserAdmin');
Route::name('control.users.admin.read.trashed')->get('/trashed', '\User\Admin\UserReadController@readTrashed');
Route::name('control.users.admin.read.trashed.search')->get('/trashed/?search={value}', '\User\Admin\UserReadController@readTrashed');
Route::name('control.users.admin.restore.trashed')->get('/{id}/trashed/restore', '\User\Admin\UserUpdateController@restoreTrashed')->where('id', '[0-9]+');
Route::name('control.users.admin.update.trashed')->get('/trashed/{id}/edit/', '\User\Admin\UserUpdateController@updateTrashed')->where('id', '[0-9]+');
Route::name('control.users.admin.update.trashed.post')->post('/{id}/trashed/edit/', '\User\Admin\UserUpdateController@updatePostTrashed')->where('id', '[0-9]+');;
Route::name('control.users.admin.delete.trashed')->get('/{id}/trashed/remove', '\User\Admin\UserDeleteController@deleteTrashed')->where('id', '[0-9]+');
