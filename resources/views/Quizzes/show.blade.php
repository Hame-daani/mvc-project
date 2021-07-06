<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $quiz->title }}</h1>
    {{-- @if (auth()->user()->id == $quiz->user_id) --}}
    @if ($quiz->user_id == 1)
        <a href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}">Edit this quiz</a>
    @endif
    <h2>Questions</h2>
    <form action="" method="post">
        @foreach ($quiz->questions as $question)
            <h4>{{ $question->text }}</h4>
            @foreach ($question->options as $option)
                <input type="radio" name="question{{ $question->id }}" id="{{ $option->id }}">
                <label for="{{ $option->id }}">{{ $option->text }}</label>
            @endforeach
        @endforeach
    </form>
</body>

</html>
