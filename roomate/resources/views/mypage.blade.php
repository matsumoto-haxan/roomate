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
          編集する
        </div>
        <p><a href="/private">プライベート情報を編集する</a></p>
        <p><a href="/condition">検索に使う情報を編集する</a></p>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
