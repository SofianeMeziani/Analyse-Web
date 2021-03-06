<?php

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

Auth::routes();

//-----------MailController--------------
Route::post('/send-mail', "MailController@sendmail");

//-----------HomeController--------------
Route::get('/', "HomeController@index");
Route::post('/create','HomeController@insert');
Route::post('/del','HomeController@del_fav');

//-----------AnalysisController--------------
Route::post("/dashboard", "AnalysisController@loading_time");

//-----------PdfController--------------
Route::post('/pdf','PdfController@generatePDF');

//-----------UserController--------------
Route::get('/user', "UserController@account");
Route::get('/history', "UserController@getAnalysis");
Route::post('/delHistory', "UserController@delAnalysisById");
Route::post('/getHistory', "UserController@getAnalysisById");
Route::post('/update-personal-info', "UserController@updatePersonalInfo");
Route::post('/update-password', "UserController@updatePassword");






