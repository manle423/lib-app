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
        $book = Book::findOrFail($id);
        return view('users.bdetails', compact('book'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = Book::query();
        $query->whereAny(['title'], 'LIKE', "%$search%");
        $query->orWhereHas('author', function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        });
        $query->orWhereHas('publisher', function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        });
        // $book = Book::where(function ($query) use ($search) {
        //     $query->where('title', 'like', "%$search%");
        // })->orWhereHas('author', function ($query) use ($search) {
        //     $query->where('title', 'like', "%$search%");
        // })->orWhereHas('publisher', function ($query) use ($search) {
        //     $query->where('title', 'like', "%$search%");
        // })
        //     ->get();
        $book = $query->get();
        return view('users.result-search', compact('book', 'search'));
    }
}
