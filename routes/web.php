<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','To_Do@index');
Route::post('/','To_Do@add');

Route::get('/delete/{id}','To_Do@delete');

Route::get('/signup','To_Do@signup');
Route::post('/signup','To_Do@post_signup');

Route::get('/signin','To_Do@signin');
Route::post('/signin','To_Do@post_signin');

Route::get('/signout','To_Do@signout');
Route::get('/complete/{id}','To_Do@complete');


Route::get('/edit/{id}','To_Do@edit');
Route::post('/edit/{id}','To_Do@update_edit');



