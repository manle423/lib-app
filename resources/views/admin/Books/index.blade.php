<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Books</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Add books</a>
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
                                <td>
                                    <a href="{{ route('admin.books.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin.books.delete', $item->id) }}"
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
        <x-sweetalert />

</x-app-layout>
