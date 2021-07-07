<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    @auth
        <h1>hi {{ Auth::user()->name }}</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                {{ __('Log out') }}
            </button>
        </form>
    @endauth
    @guest
        <a href="{{ route('login') }}">login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
    <!-- TODO: define admin guard -->
    {{-- @auth('admin')
        <h1>hi admin</h1>
    @endauth --}}
    <a href="{{ route('books.index') }}">books</a>
</body>

</html>
