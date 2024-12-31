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
    <form action="{{ route('register.step1') }}" method="post">
    @csrf
    <div class="register-form__contet">
        <label>お名前</label>
        <input type="text" name="name" placeholder="名前を入力" value="{{ old('name') }}"/>
        <p class="register-form__error-message">
            @error('name')
            {{ $message }}
            @enderror
        </p>
        <label>メールアドレス</label>
        <input type="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}"/>
        <p class="register-form__error-message">
            @error('email')
            {{ $message }}
            @enderror
        </p>
        <label>パスワード</label>
        <input type="password" name="password" placeholder="パスワードを入力" value="{{ old('password') }}"/>
        <p class="register-form__error-message">
            @error('password')
            {{ $message }}
            @enderror
        </p>
    </div>

    <div class="register-form__button">
        <button type="submit">次に進む</button>
    </div>
    </form>

    <div class="register-page__button">
        <a href="/login">ログインはこちら</a>
    </div>

</div>

@endsection