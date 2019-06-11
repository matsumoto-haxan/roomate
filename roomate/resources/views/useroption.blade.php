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
          <ul>
            <li>want_condition<input type="text" name="want_condition" value="{{$useropt->want_condition}}" placeholder=""></li>
            <li>sex<input type="text" name="sex" value="{{$useropt->sex}}" placeholder=""></li>
            <li>birthday<input type="text" name="birthday" value="{{$useropt->birthday}}" placeholder=""></li>
            <li>job_id<input type="text" name="job_id" value="{{$useropt->job_id}}" placeholder=""></li>
            <li>lover_condition<input type="text" name="lover_condition" value="{{$useropt->lover_condition}}" placeholder=""></li>
            <li>min_cost<input type="text" name="min_cost" value="{{$useropt->min_cost}}" placeholder=""></li>
            <li>max_cost<input type="text" name="max_cost" value="{{$useropt->max_cost}}" placeholder=""></li>
            <li>living_area<input type="text" name="living_area" value="{{$useropt->living_area}}" placeholder=""></li>
            <li>have_room_cd<input type="text" name="have_room_cd" value="{{$useropt->have_room_cd}}" placeholder=""></li>
            <li>represent_cd<input type="text" name="represent_cd" value="{{$useropt->represent_cd}}" placeholder=""></li>
            <li>income<input type="text" name="income" value="{{$useropt->income}}" placeholder=""></li>
            <li>cleanliness_self<input type="text" name="cleanliness_self" value="{{$useropt->cleanliness_self}}" placeholder=""></li>
            <li>cleanliness_score<input type="text" name="cleanliness_score" value="{{$useropt->cleanliness_score}}" placeholder=""></li>
            <li>alone_exp<input type="text" name="alone_exp" value="{{$useropt->alone_exp}}" placeholder=""></li>
            <li>roomshare_exp<input type="text" name="roomshare_exp" value="{{$useropt->roomshare_exp}}" placeholder=""></li>
            <li>sharehouse_exp<input type="text" name="sharehouse_exp" value="{{$useropt->sharehouse_exp}}" placeholder=""></li>
            <li><button type="submit">更新する</button>
            </ul>
          </form>
        </div>

        <div class="card">
          <div class="card-header">
            住みたいエリア
          </div>
          <div>
            <form action="/areaUpdate" method="post">
              {{ csrf_field() }}
              <div>
                @foreach($saitamapref as $area)

                @if($loop->first)
                <div>
                  {{ $area->pref_name }}
                </div>
                @else
                <div>
                  <input type="checkbox" name="area[]" value="{{ $area->area_cd }}" @if($area->selectflg != "" )checked="checked"@endif>
                  {{ $area->city_name }}
                </div>
                @endif

                @endforeach
              </div>
              <button type="submit">更新する</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endsection
