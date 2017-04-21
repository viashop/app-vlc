<?php

Route::name('oauth.authenticate.facebook')->get('facebook', 'FacebookController@authenticate');
Route::name('oauth.authenticate.google')->get('google', 'GoogleController@authenticate');
Route::name('oauth.authenticate.twitter')->get('twitter', 'TwitterController@authenticate');
