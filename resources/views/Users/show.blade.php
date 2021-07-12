<x-base>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    {{ $user->name }}
                </h1>
                <p>
                    Your total score is: <span class="badge rounded-pill bg-info text-dark">{{ $user->scores }}</span>
                </p>
                <a class="btn btn-secondary" href="{{ route('users.edit', ['user' => $user->id]) }}">Edit My Info</a>
            </div>
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">
                            Quizzes
                        </h1>
                        @if (count($user->quizzes) == 0)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                No Quiz available.
                            </div>
                        @else
                            <ul class="list-group">
                                @foreach ($user->quizzes as $quiz)
                                    <li class="list-group-item justify-content-between d-flex">
                                        <a
                                            href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                                        @if ($quiz->is_active)
                                            <span class="badge rounded-pill bg-success text-dark">Active</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger text-dark">Deactive</span>
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
                            Attempts
                        </h1>
                        @if (count($user->attempts) == 0)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                No Attempt available.
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
