@props(['item'])

<div class="col-md-4 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Edit Button -->
                <a href="{{ route('admin.authors.edit', $item->id) }}"
                    class="card-title h2 text-decoration-none">{{ $item->name }}</a>
                    
                {{-- Delete Button --}}
                <a href="{{ route('admin.authors.destroy', $item->id) }}" onclick="confirm(event)"
                    class="card-title h2 text-decoration-none">
                    <i class='fas fa-trash-alt' style='font-size:20px'></i>
                </a>

                {{-- <!-- Delete Button -->
                <form action="{{ route('admin.authors.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this publisher?');"
                    style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="card-title h2 text-decoration-none">
                        <i class="fas fa-trash-alt" style="font-size:20px"></i>
                    </button>
                </form> --}}

            </div>
            <p class="card-text"><strong>Updated At:</strong> {{ $item->updated_at->diffForHumans() }}
        </div>
    </div>
</div>  

<x-sweetalert />