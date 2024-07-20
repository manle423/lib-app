<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'posts.index')->name('home');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route for registering user
Route::view('register', 'auth.register')->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route for login user
Route::view('login', 'auth.login')->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route for logout user
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

