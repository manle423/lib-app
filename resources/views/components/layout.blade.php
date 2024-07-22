<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Laravel</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a class="navbar-brand" href="{{ route('home') }}">Home</a>
                            </li>
                            <li><a class="navbar-brand" href="{{ route('admin.publishers.index') }}">Publisher</a></li>
                            <li><a class="navbar-brand" href="{{ route('admin.authors.index') }}">Author</a></li>
                            <li><a class="navbar-brand" href="{{ route('admin.category.index') }}">Category</a></li>

                        </ul>
                    </div>
                </nav>
                @auth
                    <div class="dropdown" x-data="{ open: false }">
                        {{-- Dropdown menu button --}}
                        <button @click="open = !open" class="btn btn-secondary dropdown-toggle btn-circle btn-xl"
                            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="https:picsum.photos/200" alt="">
                        </button>
                        {{-- Dropdown menu --}}
                        <div x-show="open" @click.outside="open=false">
                            <p>{{ auth()->user()->name }}</p>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('admin.category.index') }}">Category</a>

                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <div>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endguest

            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>

</html>
