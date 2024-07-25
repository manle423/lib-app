<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Loan;
use App\Models\Publisher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $countBooks = Book::count();
        $countAuthors = Author::count();
        $countPublishers = Publisher::count();
        $countLoans = Loan::count();
        $countCategories = Category::count();
        return view('admin.dashboard', compact('countBooks', 'countAuthors', 'countPublishers', 'countLoans', 'countCategories'));
    }
}
