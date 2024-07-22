<x-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Authors</h1>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif

        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary mb-3">Add Author</a>
        <div class="row">
            {{-- the $authors is declared at AuthorController  --}}
            @foreach ($authors as $item)
                <x-authorCard :item="$item" />
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            {{ $authors->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-layout>
