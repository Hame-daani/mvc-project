<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $book->title }}</h1>
    <p>{{ $book->info }}</p>
    <img src="{{ $book->img }}" alt="">
    <br>
    <a href="{{ $book->link }}">read</a>
    <br>
    @can('admin')
        <a href="{{ route('books.edit', ['book' => $book->id]) }}">Edit this book</a>
    @endcan
    <h2>Quizzes</h2>
    <table>
        <ul>
            @foreach ($book->quizzes as $quiz)
                @can('view', $quiz)
                    <li><a href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                    </li>
                @endcan
            @endforeach
        </ul>
    </table>
    @auth
        <a href="{{ route('books.quizzes.create', ['book' => $book->id]) }}">new quiz</a>
    @endauth
</body>

</html>
