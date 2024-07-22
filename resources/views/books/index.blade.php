<x-layout>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Books</h1>
        <a href="{{ route('admin.book.create') }}" class="btn btn-primary mb-3">Add books</a>
        <div class="row">
            {{-- @foreach ($books as $item) --}}
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">aaaa</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>

            <div class="d-flex justify-content-center">
                {{ $books->links('pagination::bootstrap-5') }}
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
