<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/tasks', [TaskApiController::class, 'apiIndex']);
Route::put('/tasks/{id}', [TaskApiController::class, 'apiUpdate']); 

Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/tasks/{id}', [TaskApiController::class, 'apiDestroy']);

Route::post('/register', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'User telah berhasil didaftarkan', 
        'user' => $user
    ]);
});
});