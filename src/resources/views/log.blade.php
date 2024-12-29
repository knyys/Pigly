@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
@endsection

@section('content')
    <div class="weight-log-page">
        <div class="weight__content">
            <table class="weight-table">
                <tr class="weight-table__row">
                    <td>目標体重</td>
                    <td>目標まで</td>
                    <td>最新体重</td>
                </tr>
                <tr class="weight-table__data">
                    <td>45.0kg</td>
                    <td>-1.5kg</td>
                    <td>46.5kg</td>
                </tr>
            </table>
        </div>

        <div class="weight-log__content">
            <div class="weight-log-page__form">
                <form class="search-form" action="{{ route('weight_logs.search') }}" method="get">
                    <input type="date" name="start_date" />~<input type="date" name="end_date"/>
                    <button class="search-button">検索</button>
                
                  @if (isset($searchData))
                    <a class="reset-button" href="/weight_logs">リセット</a>
                    <div class="search-result">
                      <span>{{ $startDate }} ~ {{ $endDate }}の検索結果{{ $datas->total() }}件</span>
                    </div>
                  @endif
                </form>
                <a class="add-button" href="">データ追加</a>
            </div>
            
            <table class="weight-log-table">
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
                @foreach($datas as $data)
                <tr>
                  <td>{{ $data->date }}</td>
                  <td>{{ $data->weight }}kg</td>
                  <td>{{ $data->calories }}cal</td>
                  <td>{{ $data->exercise_time }}</td>
                  <td>
                    <a class="weight-log__detail-btn" href="#modal-{{$data->id}}">✐</a>
                  </td>
                </tr>
                @endforeach
            </table>
            
            <div class="pagination-content">
                {{ $datas->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
      </div>
    </div>

@foreach($datas as $data)
<div class="modal" id="modal-{{$data->id}}">
  <a href="#!" class="modal-overlay"></a>
  <div class="modal__inner">
    <a href="#!" class="modal__close">&times;</a>
    <h2>Weight Logを追加</h2>
    <div class="modal__content">
      <form class="modal__detail-form" action="" method="">
        @csrf
        <div class="modal-form__group">
          <label class="modal-form__label" for="date-{{$data->id}}">日付</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="date" name="date" id="date-{{$data->id}}" value="{{$data->date}}" />
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="weight-{{$data->id}}">体重</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="weight" id="weight-{{$data->id}}" value="{{$data->weight}}" />
            <span class="input-unit">kg</span>
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="calories-{{$data->id}}">摂取カロリー</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="calories" id="calories-{{$data->id}}" value="{{$data->calories}}" />
            <span class="input-unit">cal</span>
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="exercise_time-{{$data->id}}">運動時間</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="exercise_time" id="exercise_time-{{$data->id}}" value="{{$data->exercise_time}}" />
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="exercise_content-{{$data->id}}">運動内容</label>
          <div class="modal-form__input">
            <textarea name="exercise_content" id="exercise_content-{{$data->id}}">{{$data->exercise_content}}</textarea>
          </div>
        </div>

        <input type="hidden" name="id" value="{{$data->id}}" />
        <input class="modal-form__update-btn btn" type="submit" value="登録" />
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection
