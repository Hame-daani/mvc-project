<x-base>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    {{ $user->name }}
                </h1>
                <p>
                    مجموع امتیازات شما: <span class="badge rounded-pill bg-info text-dark">{{ $user->scores }}</span>
                </p>
                <a class="btn btn-secondary" href="{{ route('users.edit', ['user' => $user->id]) }}">ویرایش اطلاعات
                    من</a>
            </div>
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">
                            کوییزهای من
                        </h1>
                        @if (count($user->quizzes) == 0)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                شما هیچ کوییزی ندارید
                            </div>
                        @else
                            <ul class="list-group">
                                @foreach ($user->quizzes as $quiz)
                                    <li class="list-group-item justify-content-between d-flex">
                                        <a
                                            href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                                        @if ($quiz->is_active)
                                            <span class="badge rounded-pill bg-success text-dark">فعال</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger text-dark">غیرفعال</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">
                            تلاش‌های من
                        </h1>
                        @if (count($user->attempts) == 0)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                شما تا حالا هیچ تلاشی نداشتید
                            </div>
                        @else
                            <ul class="list-group">
                                @foreach ($user->attempts as $quiz)
                                    <li class="list-group-item justify-content-between d-flex">
                                        <a
                                            href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                                        <span
                                            class="badge rounded-pill bg-info text-dark">{{ $quiz->pivot->score }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
