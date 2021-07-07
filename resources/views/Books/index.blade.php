<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    @foreach ($books as $book)
        <ul>
            <li><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
        </ul>
    @endforeach
    @can('admin')
        <a href="{{ route('books.create') }}">new book</a>
    @endcan
</body>

</html>
