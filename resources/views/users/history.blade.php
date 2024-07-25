@extends('layouts.user.app')
@section('title', 'Book Details')
@section('content')

    <div class="container my-5">
        <h1 class="text-center mb-4">History</h1>
        <div class="row">

            <div class="container mt-3">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Title book</th>
                            <th>Loan_date</th>
                            <th>Due_date</th>
                            <th>Return date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrowers as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->borrower_name }}</td>
                                <td>{{ $item->borrower_email }}</td>
                                <td>{{ $item->borrower_phone }}</td>
                                <td>{{ $item->loan->book->title }}</td>
                                <td>{{ $item->loan->loan_date }}</td>
                                <td>{{ $item->loan->due_date }}</td>
                                <td>{{ $item->loan->return_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $borrowers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
