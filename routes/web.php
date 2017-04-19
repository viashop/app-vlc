<?php


//Tests

Route::get('/viewpdf', 'Tests\PdfviewController@index');
Route::get('/payments/excel','Tests\PaymentsController@excel');
Route::get('/correios','Tests\CorreiosController@index');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});	


Route::get('/admin', function () {
    return Request::url();
});
