<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                aria-current="page">صفحه اصلی</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('books.index') }}"
                class="nav-link {{ Route::is('books.index') ? 'active' : '' }}">کتاب‌ها</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.tops') }}"
                class="nav-link {{ Route::is('users.tops') ? 'active' : '' }}">کاربران برتر</a>
        </li>
        @guest
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link {{ Route::is('register') ? 'active' : '' }}">ثبت
                    نام</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ Route::is('login') ? 'active' : '' }}">ورود</a>
            </li>
        @endguest
        @can('admin')
            <li class="nav-item">
                <a href="{{ route('quizzes.index') }}"
                    class="nav-link {{ Route::is('quizzes.index') ? 'active' : '' }}">کوییزها</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">کاربران</a>
            </li>
        @endcan
        @auth
            <li class="nav-item">
                <a href="{{ route('users.show', ['user' => Auth::id()]) }}"
                    class="nav-link {{ Route::is('users.show') ? 'active' : '' }}">پروفایل من</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li class="nav-item">
                    <button type="submit" class="nav-link {{ Route::is('logout') ? 'active' : '' }}">
                        خروج
                    </button>
                </li>
            </form>
        @endauth
    </ul>
</header>
