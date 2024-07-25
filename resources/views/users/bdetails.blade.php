@extends('layouts.user.app')
@section('title', 'Book Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-entry">
                    <h2 class="section-title divider">Featured Book</h2>
                    <div class="products-content">
                        <div class="author-name">{{ $book->author->name }}</div>
                        <h3 class="item-title">{{ $book->title }}</h3>
                        {{-- {{ dd($book->description) }} --}}
                        <p>{{ $book->description }}</p>
                        <div class="item-price">{{ $book->published_year }}</div>
                        <div class="btn-wrap">
                            <a href="{{ route('borrows_book', $book->id) }}" class="btn-accent-arrow">Borrow now ! <i
                                    class="icon icon-ns-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset($book->image) }}" alt="banner"
                    class="img-fluid img-thumbnail rounded mx-auto d-block mt-5">
            </div>
        </div>
    </div>
@endsection
