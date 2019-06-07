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
      }


      return view('mypage', compact('userdata','userinfo'));

    }

    //
    public function postData(Request $request)
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
