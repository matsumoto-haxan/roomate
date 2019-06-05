<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


        return view('mypage');
    }
}
