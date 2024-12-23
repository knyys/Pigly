@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('title')
<div class="header__inner">
    <h3 class="title">ログイン</h3>
    
</div>
@endsection

@section('content')
<div class="login-form">
<form action="" method="">
<div class="login-form__contet">
    <label>メールアドレス</label>
    <input type="text" name="email" placeholder="メールアドレスを入力" value=""/>
    <!--バリデーションを追加する-->

    <label>パスワード</label>
    <input type="text" name="password" placeholder="パスワードを入力" value=""/>
    <!--バリデーションを追加する-->

</div>
<div class="login-form__button">
    <button>ログイン</button>
</div>
</form>
<div class="login-page__button">
<a href="/register/step1">アカウント作成はこちら</a>
</div>
</div>
@endsection