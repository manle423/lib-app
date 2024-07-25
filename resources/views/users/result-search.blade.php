@extends('layouts.user.app')
@section('title', 'Result')
@section('content')
    <div class="container">
        @if ($book->isEmpty())
            <p>No results found for your query.</p>
        @else
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            <div class="row">
                @foreach ($book as $item)
                    <div class="col-md-3">
                        <div class="product-item">
                            <a href="{{ route('bdetails', $item->id) }}"><img src="{{ $item->image }}"
                                    alt="{{ $item->title }}" class="product-item">
                                <figure class="product-style">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Borrow
                                        books</button>
                                </figure>
                            </a>
                            <figcaption>
                                <h3>{{ $item->title }}</h3>
                                <span>{{ $item->author->name }}</span>
                                <span>{{ $item->publisher->name }}</span>
                            </figcaption>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
