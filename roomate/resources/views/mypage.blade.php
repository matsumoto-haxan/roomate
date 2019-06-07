@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Mypage</div>
        <p><a href="/dashboard">ダッシュボード</a></p>
        <p><a href="/mypage">マイページ</a></p>
        <p><a href="/searchlist">検索一覧</a></p>
        <p><a href="/messagelist">メッセージ一覧</a></p>
      </div>

      <div class="card">
        <div class="card-header">
          Mydata
        </div>
        <div class="">
          <div>アイコンURL：{{ $userinfo->icon_url }}</div>
          <div>ニックネーム：{{ $userdata->name }}</div>
          <div>メールアドレス：{{ $userdata->email }}</div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          プライベート情報
        </div>
        <form action="/mypage" method="post">
          {{ csrf_field() }}
          <div>
            <input type="text" name="fullname" value="{{$userinfo->fullname}}" placeholder="本名">
            <textarea name="introduction" placeholder="自己紹介">{{$userinfo->introduction}}</textarea>
              アイコンを変更する機能、部屋写真を変更する機能、自分の写真を変更する機能
            <button type="submit">変更する</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
@endsection
