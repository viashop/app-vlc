<?php

Route::name('invitation.accept')->get('/aceitar', 'InvitationController@accept');
Route::name('invitation.refused')->get('/recusar', 'InvitationController@refused');
