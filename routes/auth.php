<?php

use App\Http\Controllers\Api\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('user-profile', [AuthController::class, 'getUserProfile']);
});
