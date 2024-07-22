<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::latest()->paginate(6);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        $publisher = Publisher::all();
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        // $request->validate([
        //     'title' => 'required|max:255|string|unique:books',
        //     'author_id' => 'required|exists:authors,id',
        //     'ISBN' => 'required|max:255|string',
        //     'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Updated validation for image
        //     'publisher_id' => 'required|exists:publishers,id',
        //     'published_year' => 'nullable|integer|min:1900|max:' . date('Y'),
        //     'category_id' => 'required|exists:categories,id'
        // ]);

        // Handle the file upload
        $filename = null;
        $path = 'uploads/books/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $filename);
        }

        // Test dd
        // dd([
        //     'title' => $request->title,
        //     'author_id' => $request->author_id,
        //     'ISBN' => $request->ISBN,
        //     'image' => $filename ? $path . $filename : null,
        //     'publisher_id' => $request->publisher_id,
        //     'published_year' => $request->published_year,
        //     'category_id' => $request->category_id,
        // ]);

        // Create the book
        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'ISBN' => $request->ISBN,
            'image' => $filename ? $path . $filename : null, // Store the path to the image or null if no image was uploaded
            'publisher_id' => $request->publisher_id,
            'published_year' => $request->published_year,
            'category_id' => $request->category_id,
            'quantity' => 50
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
