<x-app-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Categories</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
        <div class="row">
            @foreach ($categories as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-content-center"> <a
                                    href="{{ route('admin.categories.edit', $item->id) }}"
                                    class="card-title h2 text-decoration-none">{{ $item->name }}</a>
                                <a href="{{ route('admin.categories.delete', $item->id) }}" onclick="confirm(event)"
                                    class="card-title h2 text-decoration-none">
                                    <i class='fas fa-trash-alt' style='font-size:20px'></i>
                                </a>
                            </div>

                            <p class="card-text"><strong>Updated At:</strong>
                                {{ $item->updated_at->diffForHumans() }}
                            </p>
                            <p class="card-text"><strong>Name:</strong> {{ $item->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <x-sweetalert />

</x-app-layout>
