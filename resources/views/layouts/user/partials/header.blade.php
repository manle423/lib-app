<!DOCTYPE html>
<html lang="en">

<head>
    <title>BookSaw - Free Book Store HTML CSS Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('users/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('users/style.css') }}">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    <div id="header-wrap">

        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links-->
                    </div>
                    <div class="col-md-6">
                        <div class="right-element d-flex justify-center float-end">
                            @if (Auth::check())
                                <!-- Nếu người dùng đã đăng nhập -->
                                <a href="{{ route('profile.edit') }}" class="user-account for-buy me-0"
                                    style="display: block;"><i class="icon icon-user"></i><span>Account</span></a>
                                <form class="m-0 p-0" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @else
                                <!-- Nếu người dùng chưa đăng nhập -->
                                <a href="{{ route('login') }}" class="user-account for-buy me-3"><i
                                        class="icon icon-user"></i><span>Login</span></a>
                                <a href="{{ route('register') }}" class="user-account for-buy me-3"><i
                                        class="icon icon-user"></i><span>Register</span></a>
                                {{-- <form class="m-0 p-0" method="POST" action="{{ route('logout') }}"
                                    style="display: none;">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form> --}}
                            @endif

                            <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Cart:(0
                                    $)</span></a>

                            <div class="action-menu">
                                <div class="search-bar">
                                    <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" action="{{ route('search') }}"
                                        class="search-box">
                                        <input class="search-field text search-input" name="search"
                                            placeholder="Search" type="search"
                                            value="{{ isset($search) ? $search : '' }}">
                                    </form>
                                </div>
                            </div>
                        </div><!--top-right-->
                    </div>

                </div>
            </div>
        </div><!--top-content-->

        <header id="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="{{ route('dashboard') }}"><img src="{{ asset('users/images/main-logo.png') }}"
                                    alt="logo"></a>
                        </div>

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    <li class="menu-item active"><a href="#billboard">Home</a></li>

                                    <li class="menu-item"><a href="#featured-books" class="nav-link">Featured</a>
                                    </li>
                                    <li class="menu-item"><a href="#popular-books" class="nav-link">Popular</a></li>


                                </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>

                    </div>

                </div>
            </div>
        </header>

    </div><!--header-wrap-->
