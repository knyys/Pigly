@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/log.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <td>{{ $targetWeight }}kg</td>
        <td>{{ $weightDifference }}kg</td>
        <td>{{ $latestWeight }}kg</td>
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
      <a class="add-button" href="#modal-new">データ追加</a>
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

<div class="modal" id="modal-new">
  <a href="#!" class="modal-overlay"></a>
  <div class="modal__inner">
    <h2>Weight Logを追加</h2>
    <div class="modal__content">
      <form class="modal__detail-form" action="{{ route('weight_logs.store') }}" method="post">
        @csrf
        <div class="modal-form__group">
          <label class="modal-form__label" for="date-new">日付</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="date" name="date" id="date-new" />
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="weight-new">体重</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="weight" id="weight-new" />
            <span class="input-unit">kg</span>
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="calories-new">摂取カロリー</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="calories" id="calories-new" />
            <span class="input-unit">cal</span>
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="exercise_time-new">運動時間</label><span class="required">必須</span>
          <div class="modal-form__input">
            <input type="text" name="exercise_time" id="exercise_time-new" />
          </div>
        </div>

        <div class="modal-form__group">
          <label class="modal-form__label" for="exercise_content-new">運動内容</label>
          <div class="modal-form__input">
            <textarea name="exercise_content" id="exercise_content-new"></textarea>
          </div>
        </div>
        <div class="modal-form__btn">
          <a href="#!" class="btn__return">戻る</a>
          <input class="btn__update" type="submit" value="登録" />
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($datas as $data)
<div class="modal" id="modal-{{$data->id}}">
  <a href="#!" class="modal-overlay"></a>
  <div class="modal__inner">
    <h2>Weight Log</h2>
    <div class="modal__content">
      <form class="modal__detail-form" action="{{ route('weight_logs.update', $data->id) }}" method="post">
        @csrf
        @method('PATCH')
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
        
        <div class="modal-form__btn">
            <a href="#!" class="btn__return">戻る</a>
            <input type="hidden" name="id" value="{{$data->id}}" />
            <input class="btn__update" type="submit" value="登録" />
        </div>
      </form>
      <form class="modal__detail-form" action="{{ route('weight_logs.destroy', $data->id) }}" method="post">
          @csrf
          @method('DELETE')
          <div class="modal-form__delete-btn">
              <input type="hidden" name="id" value="{{ $data->id }}" />
              <button type="submit" class="delete-icon">
                  <i class="fas fa-trash custom-icon" aria-hidden="true"></i>
              </button>
          </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection
