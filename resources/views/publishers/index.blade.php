<x-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Publishers</h1>

        <div class="row">
            {{-- the $publishers is declared at PublisherController  --}}
            @foreach ($publishers as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->name }}</h2>
                            <p class="card-text"><strong>Updated At:</strong> {{ $item->updated_at->diffForHumans() }}</p>
                            <p class="card-text"><strong>Address:</strong> {{ $item->address }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $item->phone }}</p>
                            <p class="card-text"><strong>Email:</strong> {{ $item->email }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $publishers->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-layout>

{{-- @auth
        <h1>Logged in</h1>
    @endauth

    @guest
        <h1>Guest</h1>
    @endguest --}}
