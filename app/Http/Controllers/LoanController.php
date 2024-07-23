<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $books = Book::all();
        $loans = Loan::latest()->paginate(6);
        return view('admin.loans.index', compact('users', 'books', 'loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('admin.loans.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->loan_date);
        // Validate data
        $fields = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'loan_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after_or_equal:loan_date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);

        // Create the loan
        Loan::create($fields);

        // Redirect with message
        return back()->with('success', 'Loan added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the publisher by ID
        $loans = Loan::findOrFail($id);

        // Get all the users
        $users = User::all();

        // Get all the books
        $books = Book::all();
        return view('admin.loans.edit', compact('loans', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find loan by id
        $loan = Loan::findOrFail($id);

        // Validate data
        $fields = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'loan_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after_or_equal:loan_date',
            'return_date' => 'nullable|date|after_or_equal:loan_date',
        ]);
        
        $loan->update($fields);


        return back()->with('success', 'Loan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        // Find loan by id
        $loan = Loan::findOrFail($id);

        if (!$loan) {
            return redirect()->route('admin.loans.index')
                ->with('error', 'Loan not found.');
        }

        $loan->delete();

        return back()->with('status', 'Deleted');
    }
}
