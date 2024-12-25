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
                <form class="search-form" action="" method="">
                    <input type="date" name="date" />~<input type="date" name="date"/>
                    <button class="search-button">検索</button>
                </form>
                <a class="reset-button" href="">リセット</a>
                <a class="add-button" href="">データ追加</a>
            </div>
            <span>検索した日付を表示</span>

            <table class="weight-log-table">
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
                 <!--freach-->
                <tr>
                    <td>日付</td>
                    <td>体重</td>
                    <td>カロリー</td>
                    <td>運動時間</td>
                    <td><a class="admin__detail-btn" href="">✐</a></td>
                </tr>
                <!--endfreach-->
            </table>
        </div>

<div class="modal" id="変数">
        <a href="#!" class="modal-overlay"></a>
        <div class="modal__inner">
            <h2>Weight Logを追加</h2>
          <div class="modal__content">
            <form class="modal__detail-form" action="" method="">
              @csrf
                <div class="modal-form__group">
                <label class="modal-form__label" for="">日付</label><span class="required">必須</span>
                <input type="date" name="date" value=""/>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">体重</label><span class="required">必須</span>
                <input type="text" name="weight" value=""/>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">摂取カロリー</label><span class="required">必須</span>
                <input type="text" name="calories" value=""/>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動時間</label><span class="required">必須</span>
                <input type="text" name="exercise_time" value=""/>
              </div>

              <div class="modal-form__group">
                <label class="modal-form__label" for="">運動内容</label>
                <textarea name="exercise_content" value="">
              </div>

              <input type="hidden" name="id" value="変数">
              <input class="modal-form__update-btn btn" type="submit" value="登録">


    </div>
</body>

@endsection