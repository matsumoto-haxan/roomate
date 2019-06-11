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
Route::post('/dashboard', 'dashboardController@postTweet')->name('dashboard');

// 個人情報編集ページを表示
Route::get('/mypage', 'mypageController@index')->name('mypage');
Route::post('/mypage', 'mypageController@update')->name('mypage');

// 検索条件編集ページ
Route::get('/useroption', 'userOptionController@index')->name('useroption');
Route::post('/useroption', 'userOptionController@update')->name('useroption');
Route::post('/areaUpdate', 'userOptionController@areaUpdate')->name('useroption');



// 検索ページを表示
Route::get('/searchlist', 'searchlistController@index')->name('searchlist');

///// TODO: ユーザ詳細ページは同ページ内でもいいかもしれない
// ユーザ詳細ページを表示
Route::get('/searchdetail', 'searchdetailController@index')->name('searchdetail');

// メッセージ一覧ページを表示
Route::get('/messagelist', 'messagelistController@index')->name('messagelist');

///// TODO: メッセージ詳細ページは同ページ内でもいいかもしれない
// メッセージ詳細ページを表示
Route::get('/messagedetail', 'messagedetailController@index')->name('messagedetail');

//

//


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
