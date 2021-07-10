<x-base>
    @foreach ($quizzes as $quiz)
        <ul>
            <li><a href="{{ route('quizzes.show', $quiz->id) }}">{{ $quiz->title }}</a></td>
                @if ($quiz->is_active)
                    &#9989;
                @else
                    &#10060;
                @endif

                <form action="{{ route('quizzes.destroy', ['quiz' => $quiz->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="delete" value="Delete"
                        onclick="return confirm('are you sure you want to delte this quiz?');">
                </form>
                <form action="{{ route('quizzes.toggle', ['quiz' => $quiz->id]) }}" method="post">
                    @csrf
                    <input type="submit" name="toggle" value="{{ $quiz->is_active ? 'deactive' : 'activate' }}">
                </form>
        </ul>
    @endforeach
</x-base>
