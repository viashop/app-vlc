<?php

Route::name('control.users.shops.admin.read')->get('/admin', '\User\Shop\UserReadController@readAdmin');
Route::name('control.users.shops.admin.read.search')->get('/admin/?search={value}', '\User\Shop\UserReadController@readAdmin');
Route::name('control.users.shops.editor.read')->get('/editor', '\User\Shop\UserReadController@readEditor');
Route::name('control.users.shops.editor.read.search')->get('/editor/?search={value}', '\User\Shop\UserReadController@readEditor');
Route::name('control.users.shops.admin.update')->get('/{id}/admin/edit', '\User\Shop\UserUpdateController@updateAdmin')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.update')->get('/{id}/editor/edit', '\User\Shop\UserUpdateController@updateEditor')->where('id', '[0-9]+');
Route::name('control.users.shops.admin.update.post')->post('/{id}/admin/edit', '\User\Shop\UserUpdateController@updateAdminPost')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.update.post')->post('/{id}/editor/edit', '\User\Shop\UserUpdateController@updateEditorPost')->where('id', '[0-9]+');
Route::name('control.users.shops.admin.new.password')->get('/{id}/generate/new/password/admin', '\Password\GeneratePasswordController@passwordUserShopAdmin')->where('id', '[0-9]+');
Route::name('control.users.shops.editor.new.password')->get('/{id}/generate/new/password/editor', '\Password\GeneratePasswordController@passwordUserShopEditor')->where('id', '[0-9]+');
