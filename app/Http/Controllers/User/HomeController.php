<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\Category;
use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {

        //count history
        $user = Auth::user();
        $loans = Loan::where('user_id', $user->id)->get();
        $totalBorrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->count();

        $features = Book::latest()->paginate(8);
        $book = Book::latest()->first();
        $categories = Category::all();
        $allbook = Book::all();

        return view('users.dashboard', compact('features', 'book', 'allbook', 'categories', 'totalBorrowers'));
    }
    public function show(string $id)
    {
        $user = Auth::user();
        $loans = Loan::where('user_id', $user->id)->get();
        $totalBorrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->count();
        $book = Book::findOrFail($id);
        return view('users.bdetails', compact('book', 'totalBorrowers'));
    }

    public function search(Request $request)
    {
        $userid = Auth::user();
        $loans = Loan::where('user_id', $userid->id)->get();
        $totalBorrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->count();
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

        return view('users.result-search', compact('book', 'search', 'totalBorrowers'));
    }
    public function borrow(string $id)
    {
        $userid = Auth::user();
        $loans = Loan::where('user_id', $userid->id)->get();
        $totalBorrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->count();
        //
        $book = Book::findOrFail($id);
        $user = Auth()->user();
        // dd($user);
        return view('users.borrow-book', compact('book', 'user', 'totalBorrowers'));
    }
    public function history()
    {
        $user = Auth::user();
        $loans = Loan::where('user_id', $user->id)->get();
        $borrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->with('loan.book')->paginate(6);
        $totalBorrowers = Borrower::whereIn('loan_id', $loans->pluck('id'))->count();
        return view('users.history', compact('user', 'loans', 'borrowers', 'totalBorrowers'));
    }

    public function submitBorrow(Request $request, string $id)
    {
        // Validate borrower information fields
        $fields_for_borrower = $request->validate([
            'borrower_name' => 'required|max:255',
            'borrower_email' => 'required|max:255|email',
            'borrower_phone' => 'required|max:255',
        ]);

        // Validate loan information fields
        $fields_for_loan = $request->validate([
            'loan_date' => 'required|date|after_or_equal:today',
            'loan_days' => 'required|integer|min:1|max:30',
        ]);

        // Calculate due date based on loan date and loan days
        $loanDate = Carbon::parse($fields_for_loan['loan_date']);
        $loanDays = (int)$fields_for_loan['loan_days'];
        $dueDate = $loanDate->copy()->addDays($loanDays);

        // Create the loan record and store the return date as null initially
        $loan = Loan::create([
            'user_id' => Auth()->user()->id,
            'book_id' => $id,
            'loan_date' => $loanDate,
            'due_date' => $dueDate,
            'return_date' => null,
        ]);

        // Save borrower information with the generated loan ID
        Borrower::create([
            'loan_id' => $loan->id, // Link borrower to the loan
            'borrower_name' => $fields_for_borrower['borrower_name'],
            'borrower_email' => $fields_for_borrower['borrower_email'],
            'borrower_phone' => $fields_for_borrower['borrower_phone'],
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Borrowing book successful');
    }
}
