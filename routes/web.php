<?php

use Illuminate\Support\Facades\Route;

// Welcome page (public)
Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard with statistics
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task routes (excluding show)
    Route::resource('tasks', App\Http\Controllers\TaskController::class)->except(['show']);

    // Update task status
    Route::patch('/tasks/{task}/toggle', [App\Http\Controllers\TaskController::class, 'toggleStatus'])->name('tasks.toggle');
});

require __DIR__.'/auth.php';
