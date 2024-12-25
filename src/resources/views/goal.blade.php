@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css') }}">
@endsection

@section('content')
<div class="goal-setting-page">
    <div class="setting-page">
        <h2 class="page-header">目標体重設定</h2>
        <div class="setting-form">
            <form action="" method="">
                <input type="text" name="goal-weight" value="">
                <span class="weight-pound">kg</span>
                <div class="form-button">
                    <a class="return-btn" href="/weight_logs">戻る</a>
                    <button class="update-btn" type="submit">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection