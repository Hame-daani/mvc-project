<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $quiz->title }}</h1>
    <h2>Questions</h2>
        @foreach ($quiz->questions as $question)
        <h3>{{$question->text}}</h3>
        @foreach ($question->options as $option)
            <input type="radio" name="question{{$question->id}}" id="{{$option->id}}">
            <label for="{{$option->id}}">{{$option->text}}</label>
        @endforeach
        @endforeach
</body>

</html>
