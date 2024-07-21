<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get All the publisher latest 
        $publishers = Publisher::latest()->paginate(9);
        // dd($publishers);

        return view('publishers.index', ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'address' => ['nullable','max:255'],
            'phone' => ['nullable','max:255'],
            'email' => ['nullable', 'max:255', 'email', 'unique:publishers'],
        ]);
        // dd($fields);
        // dd(Publisher::create($fields));
        // Create
        Publisher::create($fields);
        
        // dd('ok');

        // Redirect
        return back()->with('success', 'Publisher created successfully');
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
