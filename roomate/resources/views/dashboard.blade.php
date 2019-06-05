@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>


                <p><a href="/dashboard">ダッシュボード</a></p>
                <p><a href="/mypage">マイページ</a></p>
                <p><a href="/searchlist">検索一覧</a></p>
                <p><a href="/messagelist">メッセージ一覧</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
