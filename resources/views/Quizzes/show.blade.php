<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $quiz->title }}</h1>
    @can('update', $quiz)
        <a href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}">Edit this quiz</a>
    @endcan
    @if (!$quiz->is_active)
        <p style="color: red">this quiz is deactive!</p>
    @endif
    @if ($answers)
        <p style="color: red">you have attempted this before!</p>
    @endif
    <h2>Questions</h2>
    <form action="{{ route('quizzes.attempt', ['quiz' => $quiz->id]) }}" method="post">
        @csrf
        @foreach ($quiz->questions as $question)
            <h3>{{ $question->text }}</h3>
            @foreach ($question->options as $option)
                <!-- TODO: mark the answers -->
                <input type="radio" name="{{ $question->id }}" id="{{ $option->id }}" value="{{ $option->id }}">
                <label for="{{ $option->id }}">{{ $option->text }}</label>
            @endforeach
        @endforeach
        <br>
        @if (!$answers)
            <input type="submit" value="attempt">
        @endif
    </form>
</body>

</html>
