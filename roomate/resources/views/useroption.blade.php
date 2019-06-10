@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">UserOption</div>
        <p><a href="/dashboard">ダッシュボード</a></p>
        <p><a href="/mypage">マイページ</a></p>
        <p><a href="/searchlist">検索一覧</a></p>
        <p><a href="/messagelist">メッセージ一覧</a></p>
      </div>

      <div class="card">
        <div class="card-header">
          検索で使用する情報
        </div>
        <form action="/useroption" method="post">
          {{ csrf_field() }}
          <div>
            want_condition<input type="text" name="want_condition" value="{{$useropt->want_condition}}" placeholder="">
            sex<input type="text" name="sex" value="{{$useropt->sex}}" placeholder="">
            birthday<input type="text" name="birthday" value="{{$useropt->birthday}}" placeholder="">
            job_id<input type="text" name="job_id" value="{{$useropt->job_id}}" placeholder="">
            lover_condition<input type="text" name="lover_condition" value="{{$useropt->lover_condition}}" placeholder="">
            min_cost<input type="text" name="min_cost" value="{{$useropt->min_cost}}" placeholder="">
            max_cost<input type="text" name="max_cost" value="{{$useropt->max_cost}}" placeholder="">
            living_area<input type="text" name="living_area" value="{{$useropt->living_area}}" placeholder="">
            have_room_cd<input type="text" name="have_room_cd" value="{{$useropt->have_room_cd}}" placeholder="">
            represent_cd<input type="text" name="represent_cd" value="{{$useropt->represent_cd}}" placeholder="">
            income<input type="text" name="income" value="{{$useropt->income}}" placeholder="">
            cleanliness_self<input type="text" name="cleanliness_self" value="{{$useropt->cleanliness_self}}" placeholder="">
            cleanliness_score<input type="text" name="cleanliness_score" value="{{$useropt->cleanliness_score}}" placeholder="">
            alone_exp<input type="text" name="alone_exp" value="{{$useropt->alone_exp}}" placeholder="">
            roomshare_exp<input type="text" name="roomshare_exp" value="{{$useropt->roomshare_exp}}" placeholder="">
            sharehouse_exp<input type="text" name="sharehouse_exp" value="{{$useropt->sharehouse_exp}}" placeholder="">
            <button type="submit">更新する</button>
          </div>
        </form>
      </div>

      <div>
        @foreach($areas as $area)
        <div>
          <div>{{ $area->area_cd }}：{{ $area->cityname }}</div>
        </div>
        @endforeach
      </div>


    </div>
  </div>
</div>
</div>
@endsection
