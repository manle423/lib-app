<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

// Route for redirect
Route::redirect('/', 'publishers');

// Route for managing all about publishers
Route::resource('publishers', PublisherController::class);

// Only authenticate user
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Route for logout user
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Only guest access
Route::middleware('guest')->group(function () {
    // Route for registering user
    Route::view('register', 'auth.register')->middleware('guest')->name('register');
    Route::post('register', [AuthController::class, 'register']);

    // Route for login user
    Route::view('login', 'auth.login')->middleware('guest')->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
