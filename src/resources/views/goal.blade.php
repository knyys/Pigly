
@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<div class="goal-setting-page">
    <div class="setting-page">
        <h2 class="page-header">目標体重設定</h2>
        <div class="setting-form">
            <form action="{{route('goal.setting')}}" method="post">
                @csrf
                <input type="text" name="target_weight" value="">
                <span class="weight-pound">kg</span>
                <div class="register-form__validate">
                <p class="error-message">
                    @if ($errors->has('target_weight')) 
                    {!! $errors->first('target_weight') !!} 
                     @endif
                </p>
                </div>

                <div class="form-button">
                    <a class="btn__return" href="/weight_logs">戻る</a>
                    <button class="btn__update" type="submit">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection