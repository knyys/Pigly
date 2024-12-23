@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register1.css') }}">
@endsection

@section('title')
<div class="header__inner">
    <h3 class="title">新規会員登録</h3>
    <p class="sub-title">SETP1 アカウント情報の登録</p>
</div>
@endsection

@section('content')
<div class="register-form">
<form action="" method="">
<div class="register-form__contet">
    <label>お名前</label>
    <input type="text" name="name" placeholder="名前を入力" value=""/>
    <!--バリデーションを追加する-->

    <label>メールアドレス</label>
    <input type="text" name="email" placeholder="メールアドレスを入力" value=""/>
    <!--バリデーションを追加する-->

    <label>パスワード</label>
    <input type="text" name="password" placeholder="パスワードを入力" value=""/>
    <!--バリデーションを追加する-->

</div>
<div class="register-form__button">
    <button>次に進む</button>
</div>
</form>
<div class="register-page__button">
<a href="/login">ログインはこちら</a>
</div>
</div>
@endsection