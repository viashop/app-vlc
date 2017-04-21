<?php

Route::name('control.authorization.role.read')->get('/role', '\Authorization\RoleController@read');
Route::name('control.authorization.role.read.search')->get('/role/?search={value}', '\Authorization\RoleController@read');
Route::name('control.authorization.role.create')->get('/role/create', '\Authorization\RoleController@create');
Route::name('control.authorization.role.create.post')->post('/role/create', '\Authorization\RoleController@createPost');
Route::name('control.authorization.role.update')->get('/role/{id}/update', '\Authorization\RoleController@update')->where('id', '[0-9]+');
Route::name('control.authorization.role.update')->get('/role/{id}/update', '\Authorization\RoleController@update')->where('id', '[0-9]+');
Route::name('control.authorization.role.update.post')->post('/role/post', '\Authorization\RoleController@updatePost');
Route::name('control.authorization.role.delete')->get('/role/{id}/delete', '\Authorization\RoleController@delete')->where('id', '[0-9]+');

Route::name('control.authorization.permission.read')->get('/permission', '\Authorization\PermissionController@read');
Route::name('control.authorization.permission.read.search')->get('/permission/?search={value}', '\Authorization\PermissionController@read');
Route::name('control.authorization.permission.read.page')->get('/permission/?search=&page={value}', '\Authorization\PermissionController@read');
Route::name('control.authorization.permission.create')->get('/permission/create', '\Authorization\PermissionController@create');
Route::name('control.authorization.permission.create.post')->post('/permission/create', '\Authorization\PermissionController@createPost');
Route::name('control.authorization.permission.update')->get('/permission/{id}/update', '\Authorization\PermissionController@update')->where('id', '[0-9]+');
Route::name('control.authorization.permission.update.post')->post('/permission/post', '\Authorization\PermissionController@updatePost');
Route::name('control.authorization.permission.delete')->get('/permission/{id}/delete', '\Authorization\PermissionController@delete')->where('id', '[0-9]+');

Route::name('control.authorization.role.read.permission')->get('/role/{id}/permission', '\Authorization\AuthorizationPermissionRoleController@readPermission')->where('id', '[0-9]+');
Route::name('control.authorization.permission.revoke')->get('/role/{role_id}/permission/{permission_id}/revoke', '\Authorization\AuthorizationPermissionRoleController@revoke')->where('role_id', '[0-9]+')->where('permission_id', '[0-9]+');
Route::name('control.authorization.permission.remove')->get('/user/{id}/permission/remove', '\Authorization\AuthorizationPermissionRoleController@remove')->where('id', '[0-9]+');
Route::name('control.authorization.permission.authorize.post')->post('/role/{id}/permission/authorize', '\Authorization\AuthorizationPermissionRoleController@authorizePermission')->where('id', '[0-9]+');
