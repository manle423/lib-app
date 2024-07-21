<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

// Route for redirect
Route::redirect('/', 'publishers');

// Route for managing all about publishers
Route::resource('publishers', PublisherController::class);

// Route for managing all about Categories
Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name("admin.category.index"); // Matches "/category/"
        Route::get('/create', [CategoryController::class, 'create'])->middleware('auth')->name("admin.category.create"); // Matches "/category/create"
        Route::post('/add', [CategoryController::class, 'store'])->name("admin.category.store"); // Matches "/category/add"
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->middleware('auth')->name("admin.category.edit"); // Matches "/category/edit"
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name("admin.category.update"); // Matches "/category/update"
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->middleware('auth')->name("admin.category.delete"); // Matches "/category/delete"

    });
});


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
