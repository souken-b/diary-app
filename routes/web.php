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


Route::get('/','AdminUserController@index');


Route::get('usertop','UserController@index');

Route::resource('worktop','WorkController');
Route::resource('studytop','StudyController');
Route::resource('sporttop','SportController');
Route::resource('hobbytop','HobbyController');
Route::resource('familytop','FamilyController');
Route::resource('cooktop','CookingController');

Route::resource('workmemo','WorkMemoController');
Route::resource('studymemo','StudyMemoController');
Route::resource('sportmemo','SportMemoController');
Route::resource('hobbymemo','HobbyMemoController');
Route::resource('familymemo','FamilyMemoController');
Route::resource('cookmemo','CookingMemoController');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

