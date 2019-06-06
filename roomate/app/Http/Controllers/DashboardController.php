<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Tweet;

class DashboardController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    // TODO: 非ログインユーザがアクセスしようとしたときにログインページに飛ばす処理はどこに実装するべきか
    // ここに通知情報を取得する処理などを書く

    // 自分のツイート
    // TODO:tweetControllerとかに切り出すといいんだと思う
    $tweets = Tweet::select()
    -> join('users', 'users.id', '=', 'tweets.user_id')
    -> where('user_id', Auth::user()->id)
    -> get();

    return view('dashboard', compact('tweets'));

  }

  public function postTweet(Request $request)
  {
    $validator = $request->validate([
      'tweet' => ['required', 'string', 'max:140'],
    ]);
    Tweet::create([
      'user_id' => Auth::user()->id,
      'content' => $request->tweet,
    ]);
    return back();
  }
}
