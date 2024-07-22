<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

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
                <x-cards.author :item="$item" />
            @endforeach

        </div>

        <div class="d-flex justify-content-center">
            {{ $authors->links('pagination::bootstrap-5') }}
        </div>
    </div>

</x-app-layout>
