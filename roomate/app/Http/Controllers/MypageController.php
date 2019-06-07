<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\UserInfo;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
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
    //// TODO: 非ログインユーザがアクセスしようとしたときにログインページに飛ばす処理はどこに実装するべきか
    // ここに通知情報を取得する処理などを書く

    $userdata = User::select()
    -> where('users.id', Auth::user()->id)
    -> first();

    $userinfo = UserInfo::select()
    -> where('user_infos.user_id', Auth::user()->id)
    -> first();

    // 初回のみ、ユーザ情報を初期化
    // TODO: できれば登録時に作成したいがよくわからなかったのでとりあえずこっちに記載
    if($userinfo == null)
    {
      Userinfo::create([
        'user_id' => Auth::user()->id,
        'fullname' => '',
        'introduction' => 'よろしくね',
        'icon_url' => '',
        'portrate_url' => '',
        'room_url' => '',
      ]);

      $userinfo = UserInfo::select()
      -> where('user_infos.user_id', Auth::user()->id)
      -> first();
    }
    return view('mypage', compact('userdata','userinfo'));
  }


  /**
  * プライベート情報を更新する
  */
  public function updateinfo(Request $request)
  {
    //$validator = $request->validate([
    //  'fullname' => ['required', 'string', 'max:30'],
    //  'introduction' => ['required', 'string', 'max:140']
    //]);

    UserInfo::select()
    -> where('user_id', Auth::user()->id)
    -> update([
      'fullname' => $request->fullname,
      'introduction' => $request->introduction
    ]);

    return back();
  }
}
