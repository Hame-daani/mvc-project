<x-base>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    {{ $quiz->title }}
                </h1>
                @unless($quiz->is_active)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        This Quiz is Deactive!
                    </div>
                @endunless
                @cannot('attempt', $quiz)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        You already attempted this quiz!
                    </div>
                @endcannot
                <a class="btn btn-secondary" href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}">Edit this
                    quiz</a>
            </div>
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h4 class="card-title">
                            Questions
                        </h4>
                        <form action="{{ route('quizzes.attempt', ['quiz' => $quiz->id]) }}" method="post">
                            @csrf
                            @foreach ($quiz->questions as $question)
                                <p class="lead">
                                    {{ $question->text }}
                                </p>
                                @foreach ($question->options as $option)
                                    @if ($answers) {{-- attempted --}}
                                        @if (in_array($option->id, $answers))
                                            {{-- chosen --}}
                                            <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                                id="option{{ $option->id }}" value="{{ $option->id }}" disabled
                                                checked>
                                            @if ($option->is_right)
                                                {{-- user is right --}}
                                                <label class="btn btn-outline-success" for="option{{ $option->id }}">
                                                    {{ $option->text }}
                                                </label>
                                                @else{{-- user is wrong --}}
                                                <label class="btn btn-outline-danger" for="option{{ $option->id }}">
                                                    {{ $option->text }}
                                                </label>
                                            @endif
                                            @else{{-- not chosen --}}
                                            <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                                id="option{{ $option->id }}" value="{{ $option->id }}" disabled>
                                            @if ($option->is_right)
                                                {{-- correct answer --}}
                                                <label class="btn btn-outline-success" for="option{{ $option->id }}">
                                                    {{ $option->text }}
                                                </label>
                                                @else{{-- others --}}
                                                <label class="btn btn-outline-primary" for="option{{ $option->id }}">
                                                    {{ $option->text }}
                                                </label>
                                            @endif
                                        @endif
                                        @else{{-- not attempted --}}
                                        <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                            id="option{{ $option->id }}" value="{{ $option->id }}">
                                        <label class="btn btn-outline-primary" for="option{{ $option->id }}">
                                            {{ $option->text }}
                                        </label>
                                    @endif
                                @endforeach
                                <br>
                                <br>
                            @endforeach
                            <input class="btn btn-primary" type="submit" value="attempt" @cannot('attempt', $quiz)
                                disabled @endcannot>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
