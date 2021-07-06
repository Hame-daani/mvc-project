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
        <label for="delete">Do you want to delete this quiz?</label>
        <input type="submit" name="delete" value="Delete" onclick="return confirm('Confirm, please.');">
    </form>
    <br>
    <form action="{{ route('quizzes.update', ['quiz' => $quiz->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="update">
    </form>
    <h3>Questions:</h3>
    <form action="" method="post">
        {{-- <label for="q_text">add question:</label> --}}
        <input type="text" name="q_text" id="q_text">
        <input type="submit" value="add question">
    </form>
    <ul>
        @foreach ($quiz->questions as $question)
            <li>{{ $question->text }}</li>
        @endforeach
    </ul>
</body>

</html>
