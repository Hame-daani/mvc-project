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
                Log out
            </button>
        </form>
    @endauth
    <br>
    @guest
        <a href="{{ route('login') }}">login</a>
        <br>
        <a href="{{ route('register') }}">Register</a>
    @endguest
    @can('admin')
        <a href="{{ route('quizzes.index') }}">quizzes</a>
        <br>
        <a href="{{ route('users.index') }}">users</a>
    @endcan
    <br>
    <a href="{{ route('books.index') }}">books</a>
</body>

</html>
