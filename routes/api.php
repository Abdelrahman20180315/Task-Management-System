<?php

use Illuminate\Support\Facades\Route;

// Public authentication endpoints
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.register');
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.login');

//RESTful API endpoints for task management system
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', App\Http\Controllers\Api\TaskController::class);
});
