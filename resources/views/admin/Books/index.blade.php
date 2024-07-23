<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Books</h1>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Add books</a>

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
                            <th>Title</th>
                            <th>Author</th>
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
                            @php
                                $imagePath = $item->image;
                                $defaultImage = 'users/images/noimage.png';
                                $image = Illuminate\Support\Facades\File::exists(public_path($imagePath))
                                    ? asset($imagePath)
                                    : asset($defaultImage);
                            @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->author->name }}</td>
                                <td>{{ $item->ISBN }}</td>
                                {{-- <td> <img src="{{ asset($item->image) }}" alt="" height="70px" width="70px" />
                                </td> --}}
                                <td> <img src="{{ $image }}" alt="" height="70px" width="70px" /> </td>
                                <td>{{ $item->publisher->name }}</td>
                                <td>{{ $item->published_year }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <a href="{{ route('admin.books.edit', $item->id) }}"
                                        class="btn btn-primary">Edit</a>
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
