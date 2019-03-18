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

//-----------HomeController--------------
Route::get('/', "HomeController@index");
Route::post('/create','HomeController@insert');
Route::post('/del','HomeController@del_fav');

//Route::get("/dashboard", "AnalysisController@dashboard");
Route::post("/dashboard", "AnalysisController@analyse");
Route::post('/delHistory', "AnalysisController@delAnalysisById");
Route::post('/getHistory', "AnalysisController@getAnalysisById");

//-----------UserController--------------
Route::get('/user', "UserController@account");
Route::get('/history', "UserController@getAnalysis");

Route::post('/update-personal-info', "UserController@updatePersonalInfo");
Route::post('/update-password', "UserController@updatePassword");




