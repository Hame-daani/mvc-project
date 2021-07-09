<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <ol>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->scores }}
            </li>
        @endforeach
    </ol>
</body>

</html>
