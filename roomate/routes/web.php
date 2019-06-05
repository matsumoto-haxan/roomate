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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ダッシュボードを表示
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

// 個人情報編集ページを表示

// 検索ページを表示

// ユーザ詳細ページを表示

// メッセージ一覧ページを表示

// メッセージ詳細ページを表示

//

//
