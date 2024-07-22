<x-app-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Update a Category</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                    @csrf

                    {{-- Name of the publisher --}}
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $category->name }}" placeholder="Enter category's name" requried>
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>

    </div>
</x-app-layout>
