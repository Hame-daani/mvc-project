<x-base>
    <h1>{{ $quiz->title }}</h1>
    @can('update', $quiz)
        <a href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}">Edit this quiz</a>
    @endcan
    @if (!$quiz->is_active)
        <p style="color: red">this quiz is deactive!</p>
    @endif
    @cannot('attempt', $quiz)
        <p style="color: red">you have attempted this before!</p>
    @endcannot
    <h2>Questions</h2>
    <form action="{{ route('quizzes.attempt', ['quiz' => $quiz->id]) }}" method="post">
        @csrf
        @foreach ($quiz->questions as $question)
            <h3>{{ $question->text }}</h3>
            @foreach ($question->options as $option)
                <!-- TODO: mark the answers -->
                <input type="radio" name="answers[{{ $question->id }}]" id="option{{ $option->id }}"
                    value="{{ $option->id }}">
                <label for="{{ $option->id }}">{{ $option->text }}</label>
            @endforeach
        @endforeach
        <br>
        @can('attempt', $quiz)
            <input type="submit" value="attempt">
        @endcan
    </form>
</x-base>
