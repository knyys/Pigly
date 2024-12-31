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
    @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
<div class="register-form">
    <form action="{{route('register.step2.post')}}" method="post">
        @csrf
    <div class="register-form__contet">
        <label>現在の体重</label>
        <div class="input-form">
            <input type="text" name="weight" placeholder="現在の体重を入力" value=""/>
            <span class="weight-pound">kg</span>
        </div>
        <p class="register-form__error-message">
            @error('weight')
            {{ $message }}
            @enderror
        </p>
        <label>目標の体重</label>
        <div class="input-form">
            <input type="text" name="target_weight" placeholder="目標の体重を入力" value=""/>
            <span class="weight-pound">kg</span>
        </div>
        <p class="register-form__error-message">
            @error('target_weight')
            {{ $message }}
            @enderror
        </p>
    </div>

    <div class="register-form__button">
        <button type="submit">アカウント作成</button>
    </div>
    </form>

</div>

@endsection