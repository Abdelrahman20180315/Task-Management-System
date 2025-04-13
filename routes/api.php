<?php

use Illuminate\Support\Facades\Route;

//RESTful API endpoints for task management system
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', App\Http\Controllers\Api\TaskController::class);
});
