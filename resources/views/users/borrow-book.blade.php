@extends('layouts.user.app')

@section('title', 'Borrow Book')

@section('content')

    <div class="container mt-5">
        <h2>Borrow Book</h2>
        <form id="borrowForm" method="post" action="{{ route('submit_borrow', $book->id) }}">
            @csrf

            <!-- Form group for name -->
            <div class="form-group">
                <label for="borrower_name">Name*</label>
                <input type="text" id="borrower_name" name="borrower_name" class="form-control" value="{{ $user->name }}"
                    required>
                @error('borrower_name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form group for email -->
            <div class="form-group">
                <label for="borrower_email">Email*</label>
                <input type="email" id="borrower_email" name="borrower_email" class="form-control"
                    value="{{ $user->email }}" required>
                @error('borrower_email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form group for phone -->
            <div class="form-group">
                <label for="borrower_phone">Phone*</label>
                <input type="text" id="borrower_phone" name="borrower_phone" class="form-control"
                    value="{{ $user->phone }}" required>
                @error('borrower_phone')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form group for loan date -->
            <div class="form-group">
                <label for="loan_date">Loan Date*</label>
                <input type="date" id="loan_date" name="loan_date" class="form-control"
                    value="{{ today()->toDateString() }}" required>
                @error('loan_date')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form group for loan days -->
            <div class="form-group">
                <label for="loan_days">Loan Days*</label>
                <select id="loan_days" name="loan_days" class="form-control" required>
                    @for ($i = 1; $i <= 30; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                @error('loan_days')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>

            {{-- Session message --}}
            @if (session('success'))
                <x-flash-msg :msg="session('success')" type="success" />
            @elseif (session('error'))
                <x-flash-msg :msg="session('error')" type="danger" />
            @endif
        </form>
    </div>
@endsection
