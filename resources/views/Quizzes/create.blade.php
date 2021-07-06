<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $book->title }}</h1>
    <form action="{{ route('books.quizzes.store', ['book' => $book->id]) }}" method="post">
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="submit">
    </form>
</body>

</html>
