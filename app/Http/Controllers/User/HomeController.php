<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $features = Book::latest()->paginate(8);
        $book = Book::latest()->first();

        $categories = Category::all();
        $allbook = Book::all();

        return view('users.dashboard', compact('features', 'book', 'allbook', 'categories'));
    }
    public function show(string $id)
    {
        //

        $book = Book::findOrFail($id);
        return view('users.bdetails', compact('book'));
    }
}
