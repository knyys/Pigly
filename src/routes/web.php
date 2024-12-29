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

Route::get('/register/step1', [UserController::class, 'registerStep1']);
Route::post('/register/step1', [UserController::class, 'createUser'])->name('register.step1');

Route::get('/register/step2', [UserController::class, 'registerStep2'])->name('register.step2.get');
Route::post('/register/step2', [UserController::class, 'register'])->name('register.step2.post');
Route::post('/logout', [UserController::class, 'logout']);

/*Route::get('/register/step1', [UserController::class, 'registerStep1'])->name('register.step1');
Route::post('/register/step1', [UserController::class, 'createUser'])->name('register.step1.post');
Route::get('/register/step2', [UserController::class, 'registerStep2'])->name('register.step2.get');
Route::post('/register/step2', [UserController::class, 'register'])->name('register.step2.post');*/

Route::get('/weight_logs',[UserController::class,'weightLogs']);

Route::get('/wight_logs/goal_setting',[UserController::class,'goalSetting']);

Route::get('/weight_logs/search', [UserController::class, 'search'])->name('weight_logs.search');


