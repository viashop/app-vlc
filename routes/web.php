<?php

Route::domain(env('APP_URL'))->get('/', function () {
    return redirect('/login');
});


Route::get('/', function () {
    return view('welcome');
});



//Route::get('/viewpdf', 'Tests\PdfviewController@index');
//Route::get('/payments/excel','Tests\PaymentsController@excel');
//Route::get('/correios','Tests\CorreiosController@index');