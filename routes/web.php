<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

// Route for redirect
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for admin
Route::prefix('admin')->group(function () {

    // Route for managing all about authors
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name("admin.authors.index"); // Matches "/authors/"
        Route::get('/create', [AuthorController::class, 'create'])->middleware('auth')->name("admin.authors.create"); // Matches "/authors/create"
        Route::post('/store', [AuthorController::class, 'store'])->name("admin.authors.store"); // Matches "/authors/add"
        Route::get('/edit/{id}', [AuthorController::class, 'edit'])->middleware('auth')->name("admin.authors.edit"); // Matches "/authors/edit"
        Route::post('/update/{id}', [AuthorController::class, 'update'])->name("admin.authors.update"); // Matches "/authors/update"
        Route::delete('/delete/{id}', [AuthorController::class, 'destroy'])->middleware('auth')->name("admin.authors.destroy"); // Matches "/authors/delete"
    })->middleware('auth');

    // Route for managing all about Books
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name("admin.book.index"); // Matches "/book/"
        Route::get('/create', [BookController::class, 'create'])->name("admin.book.create"); // Matches "/book/create"
        Route::post('/add', [BookController::class, 'store'])->name("admin.book.store"); // Matches "/book/add"
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name("admin.book.edit"); // Matches "/book/edit"
        Route::post('/update/{id}', [BookController::class, 'update'])->name("admin.book.update"); // Matches "/book/update"
        Route::get('/delete/{id}', [BookController::class, 'destroy'])->name("admin.book.delete"); // Matches "/category/delete"
    });

    // Route for managing all about Categories
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name("admin.category.index"); // Matches "/category/"
        Route::get('/create', [CategoryController::class, 'create'])->name("admin.category.create"); // Matches "/category/create"
        Route::post('/add', [CategoryController::class, 'store'])->name("admin.category.store"); // Matches "/category/add"
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name("admin.category.edit"); // Matches "/category/edit"
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name("admin.category.update"); // Matches "/category/update"
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name("admin.category.delete"); // Matches "/category/delete"
    })->middleware('auth');


    // Route for managing all about Publishers
    Route::prefix('publishers')->group(function () {
        Route::get('/', [PublisherController::class, 'index'])->name("admin.publishers.index"); // Matches "/publishers/"
        Route::get('/create', [PublisherController::class, 'create'])->middleware('auth')->name("admin.publishers.create"); // Matches "/publishers/create"
        Route::post('/store', [PublisherController::class, 'store'])->name("admin.publishers.store"); // Matches "/publishers/add"
        Route::get('/edit/{id}', [PublisherController::class, 'edit'])->middleware('auth')->name("admin.publishers.edit"); // Matches "/publishers/edit"
        Route::post('/update/{id}', [PublisherController::class, 'update'])->name("admin.publishers.update"); // Matches "/publishers/update"
        Route::delete('/destroy/{id}', [PublisherController::class, 'destroy'])->middleware('auth')->name("admin.publishers.destroy"); // Matches "/publishers/destroy"
    })->middleware('auth');


    // Route::resource('publishers', PublisherController::class)->names([
    //     'index' => 'admin.publishers.index',
    //     'create' => 'admin.publishers.create',
    //     'store' => 'admin.publishers.store',
    //     'show' => 'admin.publishers.show',
    //     'edit' => 'admin.publishers.edit',
    //     'update' => 'admin.publishers.update',
    //     'destroy' => 'admin.publishers.destroy',
    // ])->middleware('auth');
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