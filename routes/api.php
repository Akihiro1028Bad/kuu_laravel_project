<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;

// 新規会員登録
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
// ログアウト
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'me']);

