<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KindergartenController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');

Route::middleware('guest.admin')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
});

Route::middleware('admin.auth')->group(function (): void {
    Route::get('/panel', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/zgloszenia', [SubmissionController::class, 'index'])->name('submissions.index');

    Route::get('/przedszkola', [KindergartenController::class, 'index'])->name('kindergartens.index');
    Route::post('/przedszkola', [KindergartenController::class, 'store'])->name('kindergartens.store');
});
