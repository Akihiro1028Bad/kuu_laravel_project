<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopDocumentController;
use App\Http\Controllers\KuuDocumentController;
use App\Http\Controllers\kuuButtonController;
use App\Http\Controllers\MyPageController;
use Illuminate\Support\Facades\Route;

// トップ画面
Route::controller(TopDocumentController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 未ログインでも閲覧可能
Route::get('/kuu-document', [KuuDocumentController::class, 'index'])->name('kuuDocument_index');
Route::get('/kuu-button', [kuuButtonController::class, 'index'])->name('kuuButton_index');

// ログイン後のみ閲覧可能
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // トップ画面
    Route::prefix('top')->name('top.')->group(function () {
        Route::controller(TopDocumentController::class)->group(function () {
            Route::post('{user_id}/count-up', 'countUp')->name('countUp'); // クゥーボタン押下時にカウントを更新
            Route::post('{user_id}/level-up', 'levelUp')->name('levelUp'); // クゥーレベルアップ
            Route::get('get_ranking_list', 'getRankingList')->name('getRankingList'); // ランキングリスト取得
        });
    });

    // マイページ
    Route::prefix('/mypage')->name('mypage.')->group(function () {
        Route::controller(MyPageController::class)->group(function () {
            Route::get('{user_id}', 'index')->name('index'); // マイページ閲覧
        });
    });
});

require __DIR__.'/auth.php';
