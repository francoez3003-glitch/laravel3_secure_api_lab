<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Welcome to the Laravel 13 API',
    ]);
});

Route::post('/register', [AuthController::class, 'register'])
    ->middleware('throttle:6,1');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:6,1');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum', 'role:admin,student'])->get('/students', fn () => response()->json([
    ['id' => 1, 'name' => 'Juan Dela Cruz'],
    ['id' => 2, 'name' => 'Angel Franco'],
]));
Route::middleware(['auth:sanctum', 'admin'])->get('/admin/dashboard', fn () => response()->json(['message' => 'Welcome Admin!']));
Route::middleware(['auth:sanctum', 'role:student'])->get('/student/dashboard', fn () => response()->json(['message' => 'Welcome Student!']));
});