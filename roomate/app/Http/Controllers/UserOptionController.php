<?php

namespace App\Http\Controllers;

use App\UserOption;
use App\Area;
use App\WantArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOptionController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $useropt = UserOption::select()
    -> where('user_id', Auth::user()->id)
    ->first();

    // 初回アクセス時に初期化
    // TODO: 現状では、初期状態を女性にしています
    // TODO: 金額系はドロップダウンとかにしたい
    if($useropt == null){
      $useropt = new UserOption([
        'user_id' => Auth::user()->id,
        'want_condition' => '1',
        'sex' => '1',
        'birthday' => '1995-6-1',
        'job_id' => '1',
        'lover_condition' => '0',
        'min_cost' => '40000',
        'max_cost' => '70000',
        'living_area' => '1',
        'have_room_cd' => '0',
        'represent_cd' => '1',
        'income' => '3000000',
        'cleanliness_self' => '3',
        'cleanliness_score' => '3',
        'alone_exp' => '1',
        'roomshare_exp' => '0',
        'sharehouse_exp' => '0'
      ]);

      // ユーザが現在登録しているWantAreaを返すサブクエリ
      $subquerySql =
        '(select area_cd from want_areas where user_id = ' .
        Auth::user()->id .
        ') as want_areas';

      // 埼玉
      // TODO: 今は過度な最適化は行わない
      $saitamapref = Area::
      select(
        'areas.area_cd as area_cd',
        'areas.pref_cd as pref_cd',
        'areas.city_name as city_name',
        'areas.pref_name as pref_name',
        'want_areas.area_cd as selectflg'
        )
      ->leftjoin(
        \DB::raw($subquerySql),
        'want_areas.area_cd',
        '=',
        'areas.area_cd')
      ->where('pref_cd','11')
      ->orderby('area_cd','asc')
      ->get();





    }

    return view('useroption', compact('useropt','saitamapref'));
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\UserOption  $userOption
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request)
  {
    // 第一引数で検索後、新規or更新
    UserOption::updateOrCreate(
      ['user_id' => Auth::user()->id],
      ['user_id' => Auth::user()->id,
      'want_condition' => $request->want_condition,
      'sex' => $request->sex,
      'birthday' => $request->birthday,
      'job_id' => $request->job_id,
      'lover_condition' => $request->lover_condition,
      'min_cost' => $request->min_cost,
      'max_cost' => $request->max_cost,
      'living_area' => $request->living_area,
      'have_room_cd' => $request->have_room_cd,
      'represent_cd' => $request->represent_cd,
      'income' => $request->income,
      'cleanliness_self' => $request->cleanliness_self,
      'cleanliness_score' => $request->cleanliness_score,
      'alone_exp' => $request->alone_exp,
      'roomshare_exp' => $request->roomshare_exp,
      'sharehouse_exp' => $request->sharehouse_exp
    ]);
    return back();
  }

  /**
  * 希望エリアをアップデートする
  * @param  \App\UserOption  $request
  * @return \Illuminate\Http\Response
  */
  public function areaUpdate(Request $request)
  {
    // TODO: 今回は、フルデリートフルアップデート方式を採用します

    // 値参照用のAreaマスタを取得
    $areaMasters = Area::all();
    $am;

    // そのユーザのAreaを全消し
    $targetPref = substr($request->area[0], 0, 2);
    WantArea::where('user_id', Auth::user()->id)
    ->where('pref_cd', $targetPref)
    ->delete();

    foreach ($request->area as $value) {
      foreach ($areaMasters as $am) {
        if($value == $am->area_cd){
          WantArea::Create([
            'user_id' => Auth::user()->id,
            'area_cd' => $am->area_cd,
            'pref_cd' => $am->pref_cd,
            'pref_name' => $am->pref_name,
            'city_name' => $am->city_name
          ]);
        }
      }
    }
    return back();
  }



}
