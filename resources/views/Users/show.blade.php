<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <h1>{{ $user->name }}</h1>
    <h2>Quizzes</h2>
    <table>
        <ul>
            @foreach ($user->quizzes as $quiz)
                <li><a href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                    @if ($quiz->is_active)
                        &#9989;
                    @else
                        &#10060;
                    @endif
                </li>
            @endforeach
        </ul>
    </table>
</body>

</html>
