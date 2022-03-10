<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('view-profile', [HomeController::class, 'viewProfile'])->name('view-profile');
    Route::get('review-profile', [HomeController::class, 'reviewProfile'])->name('review-profile');
});

