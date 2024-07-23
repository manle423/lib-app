@extends('layouts.user.app')
@section('title', 'User Dashboard')
@section('content')
    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Our Books</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">


                            @if ($features->isEmpty())
                                <p>No features available.</p>
                            @else
                                @foreach ($features as $feature)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            <figure class="product-style">
                                                <img src="{{ asset($feature->image) }}" alt="Books" class="product-item">
                                                <button type="button" class="add-to-cart"
                                                    data-product-tile="add-to-cart">Borrow books</button>
                                            </figure>
                                            <figcaption>
                                                <h3>{{ $feature->title }}</h3>
                                                <span>{{ $feature->author->name }}</span>
                                                <div class="item-price">{{ $feature->publisher->name }}</div>
                                            </figcaption>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('users/images/product-item2.jpg') }}
                                        "
                                            alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Great travel at desert</h3>
                                        <span>Sanchit Howdy</span>
                                        <div class="item-price">$ 38.00</div>
                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('users/images/product-item3.jpg') }}" alt="Books"
                                            class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>The lady beauty Scarlett</h3>
                                        <span>Arthur Doyle</span>
                                        <div class="item-price">$ 45.00</div>
                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="{{ asset('users/images/product-item4.jpg') }}" alt="Books"
                                            class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Once upon a time</h3>
                                        <span>Klien Marry</span>
                                        <div class="item-price">$ 35.00</div>
                                    </figcaption>
                                </div>
                            </div> --}}

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="#" class="btn-accent-arrow">View all products <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <figure class="products-thumb">
                                <img src="
                                {{ asset('users/images/single-image.jpg') }}"
                                    alt="book" class="single-image">
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-title divider">Featured Book</h2>

                                <div class="products-content">
                                    <div class="author-name">{{ $book->author->name }}</div>
                                    <h3 class="item-title">{{ $book->title }}</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet,
                                        libero ipsum enim pharetra hac.</p>
                                    <div class="item-price">{{ $book->published_year }}</div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-accent-arrow">Borrow now ! <i
                                                class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>

    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Popular Books</h2>
                    </div>

                    <ul class="tabs">
                        <li data-tab-target="#all-genre" class="active tab">All Genre</li>
                        @foreach ($categories as $category)
                            <li data-tab-target="#{{ $category->name }}" class="tab">{{ $category->name }}</li>
                        @endforeach
                        {{-- <li data-tab-target="#business" class="tab">Business</li>
                        <li data-tab-target="#technology" class="tab">Technology</li>
                        <li data-tab-target="#romantic" class="tab">Romantic</li>
                        <li data-tab-target="#adventure" class="tab">Adventure</li>
                        <li data-tab-target="#fictional" class="tab">Fictional</li> --}}
                    </ul>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item1.jpg') }}
                                            "
                                                alt="Books" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add
                                                to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Portrait photography</h3>
                                            <span>Adam Silber</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item2.jpg') }}
                                           "
                                                alt="Books" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add
                                                to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Once upon a time</h3>
                                            <span>Klien Marry</span>
                                            <div class="item-price">$ 35.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item3.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add
                                                to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Tips of simple lifestyle</h3>
                                            <span>Bratt Smith</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item4.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Just felt from outside</h3>
                                            <span>Nicole Wilson</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item5.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item6.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item7.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item8.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="business" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item2.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item4.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item6.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item8.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="technology" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item1.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item3.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item5.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item7.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="romantic" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item1.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <span>Marmik Lama</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item3.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <span>Sanchit Howdy</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item5.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item7.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="adventure" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item5.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item7.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="fictional" data-tab-content>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item5.jpgg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="{{ asset('users/images/tab-item7.jpg') }}" alt="Books"
                                                class="product-item">
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Add to
                                                Cart</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <span>Armor Ramsey</span>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!--inner-tabs-->

            </div>
        </div>
    </section>



    <section id="special-offer" class="bookshelf pb-5 mb-5">

        <div class="section-header align-center">
            <div class="title">
                <span>Grab your opportunity</span>
            </div>
            <h2 class="section-title">Books with offer</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('users/images/product-item5.jpg') }}" alt="Books"
                                        class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 50.00</span>$ 40.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('users/images/product-item6.jpg') }}" alt="Books"
                                        class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Great travel at desert</h3>
                                    <span>Sanchit Howdy</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 30.00</span>$ 38.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('users/images/product-item7.jpg') }}" alt="Books"
                                        class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>The lady beauty Scarlett</h3>
                                    <span>Arthur Doyle</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 35.00</span>$ 45.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('users/images/product-item8.jpg') }}" alt="Books"
                                        class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Once upon a time</h3>
                                    <span>Klien Marry</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 25.00</span>$ 35.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="{{ asset('users/images/product-item2.jpg') }}" alt="Books"
                                        class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">$ 40.00</div>
                                </figcaption>
                            </div>
                        </div><!--grid-->
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section>
@endsection
