<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            @auth
                <div x-data="{ open: false }">
                    {{-- Dropdown menu button --}}
                    <button @click="open = !open" type="button">
                        <img src="https:picsum.photos/200" alt="">
                    </button>
                    {{-- Dropdown menu --}}
                    <div x-show="open" @click.outside="open=false">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
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
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>
</body>

</html>
