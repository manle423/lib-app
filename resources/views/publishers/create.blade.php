<x-app-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Create a Publisher</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif

        <form action="{{ route('admin.publishers.store') }}" method="post">
            @csrf

            {{-- Name of the publisher --}}
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Enter publisher's name" requried>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Address of the publisher --}}
            <div class="form-group mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                @error('address')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Phone number of the publisher --}}
            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    placeholder="Enter phone number">
                @error('phone')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email of the publisher --}}
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</x-app-layout>
