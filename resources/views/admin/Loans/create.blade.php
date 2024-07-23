<x-app-layout>
    <div class="container my-5">
        <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

        <h2 class="mb-4">Create a Loan</h2>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.loans.store') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        {{-- Users loan books --}}
                        <label for="user_id">User*</label>
                        <select id="user_id" name="user_id" class="form-control">
                            <option value="">Select a user </option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}" {{ old('user_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Book --}}
                    <div class="form-group mb-3">
                        <label for="book_id">Book*</label>
                        <select id="book_id" name="book_id" class="form-control">
                            <option value="">Select a book </option>
                            @foreach ($books as $item)
                                <option value="{{ $item->id }}" {{ old('book_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Loan date --}}
                    <div class="form-group mb-3">
                        <label for="loan_date">Loan date*</label>
                        <input type="date" class="form-control" id="loan_date" name="loan_date"
                            value="{{ old('loan_date') }}" required>
                        @error('loan_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Due date --}}
                    <div class="form-group mb-3">
                        <label for="due_date">Due date*</label>
                        <input type="date" class="form-control" id="due_date" name="due_date"
                            value="{{ old('loan_date') }}" required>
                        @error('due_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Return date --}}
                    <div class="form-group mb-3">
                        <label for="return_date">Return date</label>
                        <input type="date" class="form-control" id="return_date" name="return_date"
                            value="{{ old('due_date') }}">
                        @error('return_date')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
