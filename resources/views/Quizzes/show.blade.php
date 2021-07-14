<x-base>
    <x-slot name="title">
        Show Quiz
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    {{ $quiz->title }}
                </h1>
                @unless($quiz->is_active)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        این کوییز غیرفعال است!
                    </div>
                @endunless
                @cannot('attempt', $quiz)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        شما قبلا در این کوییز شرکت کردید. امتیاز شما:
                        {{ $quiz->attempts()->where('user_id', Auth::id())->first()->pivot->score }}
                    </div>
                @endcannot
                <a class="btn btn-primary" href="{{ route('books.show', ['book' => $quiz->book->id]) }}">برگشت به
                    کتاب</a>
                @can('update', $quiz)
                    <a class="btn btn-secondary" href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}">ویرایش این
                        کوییز</a>
                </div>
            @endcan
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">
                            سوالات
                        </h4>
                        <form action="{{ route('quizzes.attempt', ['quiz' => $quiz->id]) }}" method="post">
                            @csrf
                            @foreach ($quiz->questions as $question)
                                <p class="lead" dir="ltr">
                                    {{ $question->text }}
                                </p>
                                @foreach ($question->options as $option)
                                    @if ($answers) {{-- attempted --}}
                                        @if (in_array($option->id, $answers))
                                            {{-- chosen --}}
                                            <input type="radio" class="btn-check" name="" id="option{{ $option->id }}"
                                                value="{{ $option->id }}" disabled checked>
                                            @if ($option->is_right)
                                                {{-- user is right --}}
                                                <label class="btn btn-outline-success" for="option{{ $option->id }}"
                                                    dir="ltr">
                                                    {{ $option->text }}
                                                </label>
                                                @else{{-- user is wrong --}}
                                                <label class="btn btn-outline-danger" for="option{{ $option->id }}"
                                                    dir="ltr">
                                                    {{ $option->text }}
                                                </label>
                                            @endif
                                            @else{{-- not chosen --}}
                                            @if ($option->is_right)
                                                {{-- correct answer --}}
                                                <input type="radio" class="btn-check" name=""
                                                    id="option{{ $option->id }}" value="{{ $option->id }}"
                                                    disabled checked>
                                                <label class="btn btn-outline-success" for="option{{ $option->id }}"
                                                    dir="ltr">
                                                    {{ $option->text }}
                                                </label>
                                                @else{{-- others --}}
                                                <input type="radio" class="btn-check" name=""
                                                    id="option{{ $option->id }}" value="{{ $option->id }}"
                                                    disabled>
                                                <label class="btn btn-outline-primary" for="option{{ $option->id }}"
                                                    dir="ltr">
                                                    {{ $option->text }}
                                                </label>
                                            @endif
                                        @endif
                                        @else{{-- not attempted --}}
                                        <input type="radio" class="btn-check" name="answers[{{ $question->id }}]"
                                            id="option{{ $option->id }}" value="{{ $option->id }}">
                                        <label class="btn btn-outline-primary" for="option{{ $option->id }}"
                                            dir="ltr">
                                            {{ $option->text }}
                                        </label>
                                    @endif
                                @endforeach
                                <br>
                                <br>
                            @endforeach
                            <input class="btn btn-primary" type="submit" value="ثبت" @cannot('attempt', $quiz) disabled
                                    @endcannot @unless($quiz->is_active) disabled @endunless>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-base>
