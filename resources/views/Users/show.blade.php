<x-base>
    <h1>{{ $user->name }}</h1>
    <p>your score is {{ $user->scores }}</p>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit my info:</a>
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
</x-base>
