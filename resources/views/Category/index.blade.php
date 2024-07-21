<x-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Categories</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Add Category</a>
        <div class="row">
            @foreach ($categories as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-content-center"> <a
                                    href="{{ route('admin.category.edit', $item->id) }}"
                                    class="card-title h2 text-decoration-none">{{ $item->name }}</a>
                                <a href="{{ route('admin.category.delete', $item->id) }}" onclick="confirm(event)"
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
    <script type="text/javascript">
        function confirm(ev) {
            ev.preventDefault();
            var url = ev.currentTarget.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this item!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                } else {
                    Swal.fire('Your item is safe!');
                }
            });
        }
    </script>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</x-layout>
