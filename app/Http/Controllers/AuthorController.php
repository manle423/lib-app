<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->paginate(6);
        return view('authors.index', compact('authors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $author = $request->validate([
            'name' => ['required', 'max:255']
        ]);
        Author::create($author);
        return back()->with('success', 'Author created successfully');
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
        $author = Author::findOrFail($id);

        if (!$author) {
            return redirect()->route('admin.authors.index')
                ->with('error', 'Author not found.');
        }
        
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find author by ID
        $author = Author::findOrFail($id);

        if (!$author) {
            return redirect()->route('admin.authors.index')
                ->with('error', 'Author not found.');
        }

        // Validate the request data
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        // Update the author's details
        $author->update($fields);

        // Redirect back with a success message
        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the author by ID
        $author = Author::findOrFail($id);

        if (!$author) {
            return redirect()->route('admin.authors.index')
                ->with('error', 'Author not found.');
        }
        // Delete the author
        $author->delete();

        // Redirect back with a success message
        return back()->with('success', 'Author deleted successfully');
    }
}
