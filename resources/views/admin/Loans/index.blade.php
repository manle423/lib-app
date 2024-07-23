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
                            <th>#</th>
                            <th>User</th>
                            <th>Book</th>
                            <th>Loan date</th>
                            <th>Due date</th>
                            <th>Return date</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
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
                                    <a href="{{ route('admin.loans.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.loans.destroy', $item->id) }}" class="btn btn-danger"
                                        onclick="event.preventDefault(); confirm(event);">Delete</a>
                                    <!-- Delete Button -->
                                    {{-- <form action="{{ route('admin.loans.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this loan?');"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $loans->links('pagination::bootstrap-5') }}
            </div>
        </div>
        <x-sweetalert />

</x-app-layout>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function confirmDelete(ev, url) {
        ev.preventDefault();
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this item!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            } else {
                Swal.fire('Your item is safe!', '', 'info');
            }
        });
    }
</script> --}}
