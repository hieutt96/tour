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

Route::get('/','UserController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/manage-tour','AdminController@manageTour');
Route::get('/admin/add-tour','AdminController@addTour');
Route::post('/admin/add-tour','AdminController@postAddTour');

Route::get('/admin/edit-tour/{id}','AdminController@editTour');
Route::post('/admin/edit-tour/{id}','AdminController@postEditTour');

Route::get('/admin/delete-tour/{id}','AdminController@delete');

Route::get('/admin/add-place/{id}','AdminController@addPlace');
Route::get('/admin/addplace/{id}','AdminController@postAddPlace');

Route::get('/user/cancel/tour/{id}','UserController@cancelTour');
Route::get('/user/join/tour/{id}','UserController@joinTour');