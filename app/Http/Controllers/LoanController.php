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
    public function index(Request $request)
    {
        // Get query parameters for sorting and pagination
        $sort = $request->query('sort', 'id');
        $direction = $request->query('direction', 'asc');

        // Join with the users and books tables for sorting
        if ($sort === 'user') {
            $loans = Loan::with(['user', 'book'])
                ->join('users', 'loans.user_id', '=', 'users.id')
                ->select('loans.*')
                ->orderBy('users.name', $direction)
                ->paginate(6);
        } elseif ($sort === 'book') {
            $loans = Loan::with(['user', 'book'])
                ->join('books', 'loans.book_id', '=', 'books.id')
                ->select('loans.*')
                ->orderBy('books.title', $direction)
                ->paginate(6);
        } elseif ($sort === 'return_date') {
            // Sorting by return_date (null values last for ascending, first for descending)
            $loans = Loan::with(['user', 'book'])
                ->orderByRaw("COALESCE(return_date, '9999-12-31') $direction")
                ->paginate(6);
        } else {
            $loans = Loan::with(['user', 'book'])
                ->orderBy($sort, $direction)
                ->paginate(6);
        }

        // Return the view with the data
        return view('admin.loans.index', compact('loans'));
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

        // Find the book and update its quantity
        $book = Book::findOrFail($request->book_id);
        $book->update(['quantity' => $book->quantity - 1]);

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

        // Check if book is returned
        if (!is_null($loan->return_date)) {
            return redirect()->route('admin.loans.index')->with('error', 'This loan cannot be edited as it has been returned.');
        }
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

        // Check if the book is returned
        if (!is_null($loan->return_date)) {
            return redirect()->route('admin.loans.index')->with('error', 'This loan cannot be deleted as it has been returned.');
        }

        // Find the book and update its quantity
        $book = Book::findOrFail($loan->book_id);
        $book->update(['quantity' => $book->quantity + 1]);

        $loan->delete();

        return back()->with('success', 'Deleted');
    }

    public function returnBook(string $id)
    {
        // Find loan by id
        $loan = Loan::findOrFail($id);

        // Check if the loan exists before updated it
        if (!$loan) {
            return redirect()->route('admin.loans.index')
                ->with('error', 'Loan not found.');
        }

        // Update the return_date to current date and time
        $loan->return_date = now();

        // Find the book and update its quantity
        $book = Book::findOrFail($loan->book_id);
        $book->update(['quantity' => $book->quantity + 1]);
        // dd($book->quantity);

        // Save the updated loan record
        $loan->save();

        // Redirect with success message
        return back()->with('success', 'Book returned successfully.');
    }
}
