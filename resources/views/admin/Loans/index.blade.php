<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Loans</h1>
        <a href="{{ route('admin.loans.create') }}" class="btn btn-primary mb-3">Add Loans</a>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
        @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" />
        @endif

        <div class="row">
            <div class="container mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">#</a>
                            </th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'user', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">User</a>
                            </th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'book', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Book</a>
                            </th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'loan_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Loan
                                    date</a></th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'due_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Due
                                    date</a></th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'return_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Return
                                    date</a></th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'created_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Created
                                    at</a></th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'updated_at', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Updated
                                    at</a></th>
                            <th><a
                                    href="{{ route('admin.loans.index', ['sort' => 'return_date', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Action</a>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->book->title }}</td>
                                <td>{{ $item->loan_date }}</td>
                                <td>{{ $item->due_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    @if (is_null($item->return_date))
                                        <a href="{{ route('admin.loans.edit', $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin.loans.destroy', $item->id) }}" class="btn btn-danger"
                                            onclick="event.preventDefault(); confirm(event);">Delete</a>
                                    @else
                                        <button class="btn btn-success" disabled>Returned</button>
                                    @endif
                                    @if (is_null($item->return_date))
                                        <form action="{{ route('admin.loans.return', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Return Book</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $loans->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
        <x-sweetalert />
    </div>
</x-app-layout>
