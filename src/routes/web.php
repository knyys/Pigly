<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//会員登録
Route::get('/register/step1', [UserController::class, 'registerStep1']);
Route::post('/register/step1', [UserController::class, 'createUser'])->name('register.step1');

//ログイン
Route::post('/login', [UserController::class, 'login'])->name('login');

//初期目標体重登録
Route::get('/register/step2', [UserController::class, 'registerStep2'])->name('register.step2.get');
Route::post('/register/step2', [UserController::class, 'register'])->name('register.step2.post');
Route::post('/logout', [UserController::class, 'logout']);

//weightLog画面
Route::get('/weight_logs',[UserController::class,'weightLogs'])->name('weight.logs');  //一覧表示
Route::get('/weight_logs/search', [UserController::class, 'search'])->name('weight_logs.search');  //検索
Route::post('/weight_logs/create',[UserController::class, 'store'])->name('weight_logs.store');  //登録
Route::patch('/weight_logs/{weightLogId}/update', [UserController::class, 'update'])->name('weight_logs.update');  //更新
Route::delete('/weight_logs/{weightLogId}/delete', [UserController::class, 'destroy'])->name('weight_logs.destroy');  //削除

//目標設定
Route::get('/weight_logs/goal_setting',[UserController::class,'goalSettingPage']);
Route::post('/weight_logs/goal_setting',[UserController::class,'goalSetting'])->name('goal.setting');


