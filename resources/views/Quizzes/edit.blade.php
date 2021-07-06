<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $quiz->title }}</h1>

    <form action="{{ route('quizzes.destroy', ['quiz' => $quiz->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <label for="delete">delete this quiz</label>
        <input type="submit" name="delete" value="Delete"
            onclick="return confirm('are you sure you want to delte this quiz?');">
    </form>

    <br>

    <form action="{{ route('quizzes.update', ['quiz' => $quiz->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="update">
    </form>

    <hr>

    <h2>Questions:</h2>

    <form action="{{ route('quizzes.questions.store', ['quiz' => $quiz->id]) }}" method="post">
        @csrf
        <input type="text" name="text" id="q_text">
        <input type="submit" value="add question">
    </form>

    <ul>
        @foreach ($quiz->questions as $question)

            <h3>{{ $question->text }}</h3>

            <form action="{{ route('questions.destroy', ['question' => $question->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <label for="delete">delete this question</label>
                <input type="submit" name="delete" value="Delete"
                    onclick="return confirm('are you sure you want to delte this question?');">
            </form>

            <form action="{{ route('questions.update', ['question' => $question->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <label for="text">text:</label>
                <input type="text" name="text" id="text">
                <input type="submit" value="update">
            </form>

            <form action="{{ route('questions.options.store', ['question' => $question->id]) }}" method="post">
                @csrf
                <input type="text" name="text" id="q_text">
                <label for="state">is this right answer?</label>
                <input type="checkbox" name="is_right" id="state">
                <input type="submit" value="add option">
            </form>

            <ul>
                @foreach ($question->options as $option)
                    <li>
                        {{ $option->text }}
                        @if ($option->is_right)
                            &#10004;
                        @endif
                        <form action="{{ route('options.destroy', ['option' => $option->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="delete" value="Delete"
                                onclick="return confirm('are you sure you want to delte this option?');">
                        </form>
                    </li>
                @endforeach
            </ul>

        @endforeach
    </ul>
</body>

</html>
