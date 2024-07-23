<x-app-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Create a Book</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.books.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Name of the publisher --}}
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter title" requried>
                        @error('title')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <div>
                            <label for="author_id">Author:</label>
                            <select id="author_id" name="author_id" class="form-control">
                                <option value="">Select an author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="name">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN"
                            placeholder="Enter category's name" requried>
                        <label for="name">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <div>
                            <label for="publisher_id">Publisher</label>
                            <select id="publisherr_id" name="publisher_id" class="form-control">
                                <option value="">Select a publisher</option>
                                @foreach ($publisher as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="name">Published year</label>
                        <input type="text" class="form-control" id="published_year" name="published_year"
                            placeholder="Enter published's name" requried>
                        <div>
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>
                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
