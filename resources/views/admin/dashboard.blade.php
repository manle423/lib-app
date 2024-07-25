<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row d-flex justify-content-between align-item-center">
                            <div class="col-md-4">
                                <div class="card" style="width: 300px; height: 400px;">
                                    <img style="height: 250px;" class="card-img-top"
                                        src="{{ asset('uploads/public/writer-clipart-md.png') }}">
                                    <div class="card-body">
                                        <h4 class="card-title">Authors</h4>
                                        @if ($countAuthors > 0)
                                            <p class="card-text"><span>Total: </span>{{ $countAuthors }}</p>
                                        @else
                                            <p class="card-text">No Authors available.</p>
                                        @endif <a href="{{ route('admin.authors.index') }}"
                                            class="btn btn-primary">See
                                            all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width:300px; height: 400px;">
                                    <img style="height: 250px;" class="card-img-top"
                                        src="{{ asset('uploads/public/Untitled.png') }}">
                                    <div class="card-body">
                                        <h4 class="card-title">Publishers</h4>
                                        @if ($countPublishers > 0)
                                            <p class="card-text"><span>Total: </span>{{ $countPublishers }}</p>
                                        @else
                                            <p class="card-text">No Publishers available.</p>
                                        @endif
                                        <a href="{{ route('admin.publishers.index') }}" class="btn btn-primary">See
                                            all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width:300px; height: 400px;">
                                    <img style="height: 250px;" class="card-img-top"
                                        src="{{ asset('uploads/public/cf929df3b4640fa9e3893c370d8448cf0ffe7fbf.jpg') }}">
                                    <div class="card-body">
                                        <h4 class="card-title">Books</h4>
                                        @if ($countBooks > 0)
                                            <p class="card-text"><span>Total: </span>{{ $countBooks }}</p>
                                        @else
                                            <p class="card-text">No books available.</p>
                                        @endif
                                        <a href="{{ route('admin.books.index') }}" class="btn btn-primary">See all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-item-center mt-5">
                            <div class="col-md-4">
                                <div class="card" style="width: 300px; height: 400px;">
                                    <img style="height: 250px;" class="card-img-top"
                                        src="{{ asset('uploads/public/images.png') }}">
                                    <div class="card-body">
                                        <h4 class="card-title">Loans</h4>
                                        @if ($countAuthors > 0)
                                            <p class="card-text"><span>Total: </span>{{ $countAuthors }}</p>
                                        @else
                                            <p class="card-text">No Loans available.</p>
                                        @endif <a href="{{ route('admin.loans.index') }}"
                                            class="btn btn-primary">See
                                            all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width:300px; height: 400px;">
                                    <img style="height: 250px;" class="card-img-top"
                                        src="{{ asset('uploads/public/7871.jpg_wh1200.jpg') }}">
                                    <div class="card-body">
                                        <h4 class="card-title">Categories</h4>
                                        @if ($countPublishers > 0)
                                            <p class="card-text"><span>Total: </span>{{ $countPublishers }}</p>
                                        @else
                                            <p class="card-text">No Categories available.</p>
                                        @endif
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">See
                                            all</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
