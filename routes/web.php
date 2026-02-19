<?php

use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Semua manajemen tugas masuk ke sini biar dapet Session login Damar
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [TaskApiController::class, 'index'])->name('dashboard');
    
    // Rute manual untuk menangani Task \
    Route::post('/tasks', [TaskApiController::class, 'store'])->name('tasks.store');
    Route::put('/tasks/{id}', [TaskApiController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskApiController::class, 'destroy'])->name('tasks.destroy');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

// Google Login
Route::prefix('auth/google')->group(function () {
    Route::get('/', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/callback', [SocialiteController::class, 'handleGoogleCallback']);
});

