@props(['item'])

{{-- @php
    dd($item);
@endphp --}}

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