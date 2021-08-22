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

Route::get('/', function () {
    return view('welcome');
});

//ユーザ登録ページ
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン・アウト処理
//ログインページ表示
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//フォームの入力内容を送信
Route::post('login', 'Auth\LoginController@login')->name('login.post');
//ログアウト
Route::get('logout', 'Auth\LoginController@logout')->name('logout');