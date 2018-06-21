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

Route::get('/', 'AnoneController@index');

Route::get('/login', 'AnoneController@login');

Route::get('/register', 'AnoneController@register');

Route::post('/register_act', 'AnoneController@register_act');

Route::get('/home', 'HomeController@index');

Route::post('/login_act', 'AnoneController@login_act');

Route::get('/test', 'AnoneController@test');



