<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopDocumentController;
use Illuminate\Support\Facades\Route;

// トップ画面
Route::controller(TopDocumentController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // トップ画面
    Route::prefix('top')->name('top.')->group(function () {
        Route::controller(TopDocumentController::class)->group(function () {
            Route::post('{user_id}/count-up', 'countUp')->name('countUp'); // クゥーボタン押下時にカウントを更新
            Route::post('{user_id}/level-up', 'levelUp')->name('levelUp'); // クゥーレベルアップ
        });
    });
});

require __DIR__.'/auth.php';
