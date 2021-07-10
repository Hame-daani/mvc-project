<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div>
        <nav>
            <a href="{{ url('/') }}">Home</a> |
            <a href="{{ route('books.index') }}">Books</a> |
            <a href="{{ route('users.tops') }}">Top Users</a> |
            @guest
                <a href="{{ route('login') }}">Login</a> |
                <a href="{{ route('register') }}">Register</a> |
            @endguest
            @can('admin')
                <a href="{{ route('quizzes.index') }}">Quizzes</a> |
                <a href="{{ route('users.index') }}">Users</a> |
            @endcan
            @auth
                <a href="{{ route('users.show', ['user' => Auth::id()]) }}">My Profile</a> |
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        Log out
                    </button>
                </form>
            @endauth
        </nav>
        <hr>
        <main>
            {{ $slot }}
        </main>
        <hr>
        <footer>
            this is footer
        </footer>
    </div>
</body>

</html>
