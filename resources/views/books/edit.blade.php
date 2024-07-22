<x-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Update a Category</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <p class="text-bg-warning">{{ $error }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.book.update', $books->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Name of the publisher --}}
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter title" value="{{ $books->title }}" requried>
                        @error('title')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <div>
                            <label for="author_id">Author:</label>
                            <select id="author_id" name="author_id" class="form-control">
                                <option value="">Select an author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ $author->id == old('author_id', $books->author_id) ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="name">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN"
                            placeholder="Enter category's name" value="{{ old('ISBN', $books->ISBN) }}" requried>
                        <label for="name">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if ($books->image)
                            <p>Current image: <img src="{{ asset($books->image) }}" alt="Current image" width="100">
                            </p>
                        @endif
                        <div>
                            <label for="publisher_id">Publisher</label>
                            <select id="publisherr_id" name="publisher_id" class="form-control">
                                <option value="">Select a publisher</option>
                                @foreach ($publisher as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == old('publisher_id', $books->publisher_id) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                @endforeach
                            </select>
                        </div>

                        <label for="name">Published year</label>
                        <input type="text" class="form-control" id="published_year" name="published_year"
                            placeholder="Enter published's name"
                            value="{{ old('published_year', $books->published_year) }}" requried>
                        <div>
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id', $books->category_id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                @endforeach
                            </select>
                        </div>



                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
</x-layout>
