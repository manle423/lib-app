<x-layout>
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
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Edit Button -->
                                <a href="{{ route('admin.publishers.edit', $item->id) }}"
                                    class="card-title h2 text-decoration-none">{{ $item->name }}</a>
                                    
                                <!-- Delete Button -->
                                <form action="{{ route('admin.publishers.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this publisher?');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="card-title h2 text-decoration-none">
                                        <i class="fas fa-trash-alt" style="font-size:20px"></i>
                                    </button>
                                </form>
                            </div>
                            <p class="card-text"><strong>Updated At:</strong> {{ $item->updated_at->diffForHumans() }}
                            </p>
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
