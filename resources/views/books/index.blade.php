<x-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Books</h1>
        <a href="{{ route('admin.book.create') }}" class="btn btn-primary mb-3">Add books</a>
        <div class="row">

            <div class="container mt-3">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>ISBN</th>
                            <th>Image</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->ISBN }}</td>
                                <td> <img src="{{ asset($item->image) }}" alt="" height="70px" width="70px" />
                                </td>
                                <td>{{ $item->publisher_id }}</td>
                                <td>{{ $item->published_year }}</td>
                                <td>{{ $item->category_id }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td><a href="{{ route('admin.book.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.book.delete', $item->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $books->links('pagination::bootstrap-5') }}
            </div>
        </div>
        <script type="text/javascript">
            function confirm(ev) {
                ev.preventDefault();
                var url = ev.currentTarget.getAttribute('href');

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
                        Swal.fire('Your item is safe!');
                    }
                });
            }
        </script>
        <!-- SweetAlert CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <!-- SweetAlert JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</x-layout>
