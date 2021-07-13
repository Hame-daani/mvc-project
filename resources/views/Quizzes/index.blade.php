<x-base>
    <x-slot name="title">
        Quizzes
    </x-slot>
    <div class="row g-0 justify-content-center">
        <ul class="list-group col-md-8">
            @foreach ($quizzes as $quiz)
                <li
                    class="list-group-item justify-content-between d-flex @unless($quiz->is_active) list-group-item-danger @endunless">
                    <div>
                        <a href="{{ route('quizzes.show', $quiz->id) }}">
                            {{ $quiz->title }}
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-3 col-md-6">
                            <form action="{{ route('quizzes.destroy', ['quiz' => $quiz->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" name="delete" value="حذف این کوییز"
                                    onclick="return confirm('are you sure you want to delte this quiz?');">
                            </form>
                        </div>
                        <div class="col-3 col-md-6">
                            <form action="{{ route('quizzes.toggle', ['quiz' => $quiz->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn @if ($quiz->is_active) btn-danger @else btn-success @endif" name="toggle"
                                value="{{ $quiz->is_active ? 'غیرفعال کردن' : 'فعال کردن' }}">
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-base>
