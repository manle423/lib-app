<x-layout>
    <div class="container my-5">
        <h2 class="mb-4">Create an Author</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif

        <form action="{{ route('admin.authors.store') }}" method="post">
            @csrf

            {{-- Name of the author --}}
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter author's name" requried>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-layout>
