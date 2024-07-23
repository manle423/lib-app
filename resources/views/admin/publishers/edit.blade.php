<x-app-layout>
    <div class="container my-5">
        <h2 class="mb-4">Edit publisher</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif

        <form action="{{ route('admin.publishers.update', $publisher->id) }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}

            {{-- Name of the publisher --}}
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter publisher's name" value="{{ old('name', $publisher->name) }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address of the publisher --}}
            <div class="form-group mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{ old('address', $publisher->address) }}">
                @error('address')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone number of the publisher --}}
            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Enter phone number" value="{{ old('phone', $publisher->phone) }}">
                @error('phone')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email of the publisher --}}
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email', $publisher->email) }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>
