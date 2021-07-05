<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <table>
        @foreach ($books as $book)
            <tr>
                <td><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
            </tr>
        @endforeach
    </table>
</body>

</html>
