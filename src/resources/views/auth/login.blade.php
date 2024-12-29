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
<form action="{{route('login')}}" method="post">
    @csrf
<div class="login-form__contet">
    <label>メールアドレス</label>
    <input type="email" name="email" placeholder="メールアドレスを入力" value="{{old('email')}}"/>
    <p class="register-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
    </p>

    <label>パスワード</label>
    <input type="password" name="password" placeholder="パスワードを入力" value="{{old('password')}}"/>
    <p class="register-form__error-message">
          @error('password')
          {{ $message }}
          @enderror
    </p>

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