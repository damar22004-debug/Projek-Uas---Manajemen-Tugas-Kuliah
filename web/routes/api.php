<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rute di LUAR middleware (Bisa ditest langsung di Thunder Client tanpa Token)
Route::get('/tasks', [TaskApiController::class, 'apiIndex']);
Route::put('/tasks/{id}', [TaskApiController::class, 'apiUpdate']); // Pindah ke sini

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/tasks/{id}', [TaskApiController::class, 'apiDestroy']);
});