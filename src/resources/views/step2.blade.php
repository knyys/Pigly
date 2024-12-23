@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register2.css') }}">
@endsection

@section('title')
<div class="header__inner">
    <h3 class="title">新規会員登録</h3>
    <p class="sub-title">SETP2 体重データの入力</p>
</div>
@endsection

@section('content')
<div class="register-form">
<form action="" method="">
<div class="register-form__contet">
    <label>現在の体重</label>
    <input type="text" name="name" placeholder="現在の体重を入力" value=""/>kg
    <!--バリデーションを追加する-->

    <label>目標の体重</label>
    <input type="text" name="name" placeholder="目標の体重を入力" value=""/>kg
    <!--バリデーションを追加する-->

</div>
<div class="register-form__button">
    <button>アカウント作成</button>
</div>
</form>

</div>
@endsection