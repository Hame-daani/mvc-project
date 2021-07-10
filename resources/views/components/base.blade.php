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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div>
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                        aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('books.index') }}"
                        class="nav-link {{ Route::is('books.index') ? 'active' : '' }}">Books</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.tops') }}"
                        class="nav-link {{ Route::is('users.tops') ? 'active' : '' }}">Top Users</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}"
                            class="nav-link {{ Route::is('register') ? 'active' : '' }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}"
                            class="nav-link {{ Route::is('login') ? 'active' : '' }}">Login</a>
                    </li>
                @endguest
                @can('admin')
                    <li class="nav-item">
                        <a href="{{ route('quizzes.index') }}"
                            class="nav-link {{ Route::is('quizzes.index') ? 'active' : '' }}">Quizzes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">Users</a>
                    </li>
                @endcan
                @auth
                    <li class="nav-item">
                        <a href="{{ route('users.show', ['user' => Auth::id()]) }}"
                            class="nav-link {{ Route::is('users.show') ? 'active' : '' }}">My Profile</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item">
                            <button type="submit" class="nav-link {{ Route::is('logout') ? 'active' : '' }}">
                                Log out
                            </button>
                        </li>
                    </form>
                @endauth
            </ul>
        </header>
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
