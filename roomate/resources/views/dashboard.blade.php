@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Dashboard
        </div>
        <p><a href="/dashboard">ダッシュボード</a></p>
        <p><a href="/mypage">マイページ</a></p>
        <p><a href="/searchlist">検索一覧</a></p>
        <p><a href="/messagelist">メッセージ一覧</a></p>
      </div>

      <div class="card">
        <div class="card-header">
          Tweet
        </div>
        <form action="/dashboard" method="post">
          {{ csrf_field() }}
          <div>
            <input type="text" name="tweet" placeholder="調子はいかが？">
            <button type="submit">ツイート</button>
          </div>
        </form>
        <div class="tweet-wrapper">
          @foreach($tweets as $tweet)
          <div>
            <div>{{ $tweet->name }}：{{ $tweet->content }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
