<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'admin']);

// Route for admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // Route for managing all about authors
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name("admin.authors.index"); // Matches "/authors/"
        Route::get('/create', [AuthorController::class, 'create'])->name("admin.authors.create"); // Matches "/authors/create"
        Route::post('/store', [AuthorController::class, 'store'])->name("admin.authors.store"); // Matches "/authors/add"
        Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name("admin.authors.edit"); // Matches "/authors/edit"
        Route::post('/update/{id}', [AuthorController::class, 'update'])->name("admin.authors.update"); // Matches "/authors/update"
        Route::delete('/delete/{id}', [AuthorController::class, 'destroy'])->name("admin.authors.destroy"); // Matches "/authors/delete"
    });

    // Route for managing all about Books
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name("admin.books.index"); // Matches "/books/"
        Route::get('/create', [BookController::class, 'create'])->name("admin.books.create"); // Matches "/books/create"
        Route::post('/add', [BookController::class, 'store'])->name("admin.books.store"); // Matches "/books/add"
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name("admin.books.edit"); // Matches "/books/edit"
        Route::post('/update/{id}', [BookController::class, 'update'])->name("admin.books.update"); // Matches "/books/update"
        Route::get('/delete/{id}', [BookController::class, 'destroy'])->name("admin.books.delete"); // Matches "/books/delete"
    });

    // Route for managing all about Categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name("admin.categories.index"); // Matches "/categories/"
        Route::get('/create', [CategoryController::class, 'create'])->name("admin.categories.create"); // Matches "/categories/create"
        Route::post('/add', [CategoryController::class, 'store'])->name("admin.categories.store"); // Matches "/categories/add"
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name("admin.categories.edit"); // Matches "/categories/edit"
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name("admin.categories.update"); // Matches "/categories/update"
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name("admin.categories.delete"); // Matches "/categories/delete"
    });


    // Route for managing all about Publishers
    Route::prefix('publishers')->group(function () {
        Route::get('/', [PublisherController::class, 'index'])->name("admin.publishers.index"); // Matches "/publishers/"
        Route::get('/create', [PublisherController::class, 'create'])->name("admin.publishers.create"); // Matches "/publishers/create"
        Route::post('/store', [PublisherController::class, 'store'])->name("admin.publishers.store"); // Matches "/publishers/add"
        Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name("admin.publishers.edit"); // Matches "/publishers/edit"
        Route::post('/update/{id}', [PublisherController::class, 'update'])->name("admin.publishers.update"); // Matches "/publishers/update"
        Route::delete('/destroy/{id}', [PublisherController::class, 'destroy'])->name("admin.publishers.destroy"); // Matches "/publishers/destroy"
    });

    // Route for managing all about Loans
    Route::prefix('loans')->group(function () {
        Route::get('/', [LoanController::class, 'index'])->name("admin.loans.index"); // Matches "/loans/"
        Route::get('/create', [LoanController::class, 'create'])->name("admin.loans.create"); // Matches "/loans/create"
        Route::post('/store', [LoanController::class, 'store'])->name("admin.loans.store"); // Matches "/loans/add"
        Route::get('/edit/{id}', [LoanController::class, 'edit'])->name("admin.loans.edit"); // Matches "/loans/edit"
        Route::post('/update/{id}', [LoanController::class, 'update'])->name("admin.loans.update"); // Matches "/loans/update"
        Route::get('/destroy/{id}', [LoanController::class, 'destroy'])->name("admin.loans.destroy"); // Matches "/loans/destroy"
    });

});

// Route for user
