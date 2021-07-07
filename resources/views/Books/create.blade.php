<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>creating new book:</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <br>
        <br>
        <label for="info">info:</label>
        <textarea name="info" id="info" cols="100" rows="5"></textarea>
        <br>
        <br>
        <label for="title">link:</label>
        <input type="url" name="link" id="link">
        <br>
        <br>
        <label for="title">img url:</label>
        <input type="url" name="img" id="img">
        <br>
        <br>
        <input type="submit" value="update">
    </form>
</body>

</html>
