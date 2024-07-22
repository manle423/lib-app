<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Publishers</h1>

        {{-- Session message --}}
        @if (session('success'))
            <x-flash-msg :msg="session('success')" type="success" />
            {{-- @elseif (session('error'))
            <x-flash-msg :msg="session('error')" type="danger" /> --}}
        @endif

        <a href="{{ route('admin.publishers.create') }}" class="btn btn-primary mb-3">Add Publisher</a>
        <div class="row">
            {{-- the $publishers is declared at PublisherController  --}}
            @foreach ($publishers as $item)
                <x-publisherCard :item="$item" />
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            {{ $publishers->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-app-layout>


{{-- @auth
        <h1>Logged in</h1>
    @endauth

    @guest
        <h1>Guest</h1>
    @endguest --}}
