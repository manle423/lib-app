<x-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Create a Category</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.book.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Name of the publisher --}}
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter title" requried>
                        @error('title')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <label for="name">Author Name</label>
                        <input type="text" class="form-control" id="authorname" name="author_id"
                            placeholder="Enter author's name" requried>
                        <label for="name">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN"
                            placeholder="Enter category's name" requried>
                        <label for="name">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <label for="name">Publisher</label>
                        <input type="text" class="form-control" id="publishername" name="publisher_id"
                            placeholder="Enter publisher's name" requried>
                        <label for="name">Published year</label>
                        <input type="text" class="form-control" id="published_year" name="published_year"
                            placeholder="Enter published's name" requried>
                        <label for="name">Category</label>
                        <input type="text" class="form-control" id="cateory" name="category_id"
                            placeholder="Enter category's name" requried>
                        <label for="name">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity"
                            placeholder="Enter category's name" requried>

                    </div>
                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
</x-layout>
