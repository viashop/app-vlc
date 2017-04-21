<?php

Route::name('oauth.register.facebook')->get('facebook', 'FacebookController@register');
Route::name('oauth.register.google')->get('google', 'GoogleController@register');
Route::name('oauth.register.twitter')->get('twitter', 'TwitterController@register');
