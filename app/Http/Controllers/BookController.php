<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Query parameters
        $sort = $request->query('sort', 'id');
        $direction = $request->query('direction', 'asc');

        // Special case for sorting
        if ($sort === 'author') {
            $books = Book::with(['author', 'publisher', 'category'])
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.*')
                ->orderBy('authors.name', $direction)
                ->paginate(6);
        } elseif ($sort === 'publisher') {
            $books = Book::with(['author', 'publisher', 'category'])
                ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->select('books.*')
                ->orderBy('publishers.name', $direction)
                ->paginate(6);
        } elseif ($sort === 'category') {
            $books = Book::with(['author', 'publisher', 'category'])
                ->join('categories', 'books.category_id', '=', 'categories.id')
                ->select('books.*')
                ->orderBy('categories.name', $direction)
                ->paginate(6);
        } else {
            $books = Book::with(['author', 'publisher', 'category'])
                ->orderBy($sort, $direction)
                ->paginate(6);
        }

        return view('admin.books.index', compact('books'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|max:255|string',
            'author_name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'ISBN' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'publisher_name' => 'required|string|max:255',
            'published_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'category_name' => 'required|string|max:255'
        ]);

        // Convert author_name to author_id
        $author = Author::where('name', $request->input('author_name'))->first();

        if (!$author) {
            return redirect()->back()->withErrors(['author_name' => 'Author not found. Please select a valid author.'])->withInput();
        }

        $author_id = $author->id;

        // Convert publisher_name to publisher_id
        $publisher = Publisher::where('name', $request->input('publisher_name'))->first();
        if (!$publisher) {
            return redirect()->back()->withErrors(['publisher_name' => 'Publisher not found. Please select a valid publisher.'])->withInput();
        }
        $publisher_id = $publisher->id;

        // Convert category_name to category_id
        $category = Category::where('name', $request->input('category_name'))->first();
        if (!$category) {
            return redirect()->back()->withErrors(['category_name' => 'Publisher not found. Please select a valid category.'])->withInput();
        }
        $category_id = $category->id;

        // Handle the file upload
        $filename = null;
        $path = 'uploads/books/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $filename);
        }

        // Create the book
        Book::create([
            'title' => $request->title,
            'author_id' => $author_id,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'ISBN' => $request->ISBN,
            'image' => $filename ? $path . $filename : null,
            'publisher_id' => $publisher_id,
            'published_year' => $request->published_year,
            'category_id' => $category_id,
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
        $books = Book::findOrFail($id);
        $authors = Author::all();
        $categories = Category::all();
        $publisher = Publisher::all();
        return view('admin.books.edit', compact('books', 'authors', 'categories', 'publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255|string|unique:books,title,' . $id,
            'author_id' => 'required|exists:authors,id',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'ISBN' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'publisher_id' => 'required|exists:publishers,id',
            'published_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'category_id' => 'required|exists:categories,id'
        ]);

        // dd([$request->hasFile('image')]);
        $filename = $book->image;
        if (!$request->hasFile('image')) {
            $book->update([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'ISBN' => $request->ISBN,
                'image' => $book->image,
                'publisher_id' => $request->publisher_id,
                'published_year' => $request->published_year,
                'category_id' => $request->category_id
            ]);
        } else {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($file->getClientOriginalExtension());
            $path = 'uploads/books/';
            $file->move(public_path($path), $filename);
            $book->update([
                'title' => $request->title,
                'author_id' => $request->author_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'ISBN' => $request->ISBN,
                'image' => $path . $filename,
                'publisher_id' => $request->publisher_id,
                'published_year' => $request->published_year,
                'category_id' => $request->category_id
            ]);
        }

        // $book->update([
        //     'title' => $request->title,
        //     'author_id' => $request->author_id,
        //     'ISBN' => $request->ISBN,
        //     'image' => $filename ? $path . $filename : $book->image,
        //     'publisher_id' => $request->publisher_id,
        //     'published_year' => $request->published_year,
        //     'category_id' => $request->category_id
        // ]);


        return back()->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::findOrFail($id);

        if (!$book) {
            return redirect()->route('admin.books.index')
                ->with('error', 'Book not found.');
        }
        if ($book->loans()->count() > 0) {
            return redirect()->route('admin.books.index')
                ->with('error', 'Book cannot be deleted because it has associated loans.');
        }

        if (File::exists($book->image)) {
            File::delete($book->image);
        }
        $book->delete();
        return back()->with('status', 'Deleted');
    }
}
