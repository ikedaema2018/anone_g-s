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

//管理者側のカテゴリーのルーティング

Route::get('/category', 'AnoneController@category');

Route::post('/category', 'AnoneController@category_insert');

Route::delete('/category/{category}', 'AnoneController@category_delete');

Route::post('/category/{category}', 'AnoneController@category_update_view');

Route::post('/category_update', 'AnoneController@category_update');

//管理者側の苦手のルーティング
Route::get('/nigate', 'AnoneController@nigate_list');

Route::post('/nigate', 'AnoneController@nigate_register');

Route::post('/nigate/{nigate}', 'AnoneController@nigate_update_view');

Route::post('/nigate_update', 'AnoneController@nigate_update');

//管理者側のスレッドのルーティング
Route::get('/thread', 'AnoneController@thread');

Route::post('/thread', 'AnoneController@thread_register');

Route::post('/thread/{thread}', 'AnoneController@thread_update_view');

Route::post('/thread_update', 'AnoneController@thread_update');

Route::delete('/thread/{thread}', 'AnoneController@thread_delete');

//管理者側のユーザーリストのルーティング
Route::get('/user_list', 'AnoneController@user_list');

Route::post('/user_list/{user}', 'AnoneController@user_list_update_view');

Route::delete('/user_list_delete/{user}', 'AnoneController@user_list_delete');

//マイページの表示(ログインしてなかったらログインページにリダイレクト)
Route::get('/mypage', 'AnoneController@mypage');





