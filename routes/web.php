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

Route::get('/', 'UsersController@index');

//ユーザ登録ページ
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン・アウト
//ログインページ表示
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//フォームに入力した情報を送信
Route::post('login', 'Auth\LoginController@login')->name('login.post');
//ログアウト
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//usersルーティング
//resource = 短縮形。複数のルートが出来てる
Route::resource('users', 'UsersController', ['only' => ['show']]);

//groupルーティング
//'middleware' => 'auth' ログインを通っている場合のみ、アクセスできる
Route::group(['middleware' => 'auth'], function () {
    //rename
    Route::put('users', 'UsersController@rename')->name('rename');
    // Movieルーティング
    Route::resource('movies', 'MoviesController', ['only' => ['create', 'store', 'destroy']]);
});