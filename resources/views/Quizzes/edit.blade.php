<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">Edit Quiz</h1>
                        <form action="{{ route('quizzes.update', ['quiz' => $quiz->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="{{ $quiz->title }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <br>
                        <form action="{{ route('quizzes.destroy', ['quiz' => $quiz->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" name="delete" value="Delete this quiz"
                                onclick="return confirm('are you sure you want to delte this quiz?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-10">
                    <div class="card-body">
                        <h2 class="card-title">Questions</h2>
                        <form action="{{ route('quizzes.questions.store', ['quiz' => $quiz->id]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="text" id="q_text"
                                    placeholder="Add question">
                            </div>
                            <button type=" submit" class="btn btn-primary">Add Question</button>
                        </form>
                        @foreach ($quiz->questions as $question)
                            <div class="card">
                                <div class="row g-0 justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $question->text }}</h3>
                                            <form
                                                action="{{ route('questions.update', ['question' => $question->id]) }}"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="text" id="q_text"
                                                        placeholder="{{ $question->text }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update This
                                                    Question</button>
                                            </form>
                                            <form
                                                action="{{ route('questions.destroy', ['question' => $question->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" name="delete"
                                                    value="Delete This Question"
                                                    onclick="return confirm('are you sure you want to delte this question?');">
                                            </form>
                                            <div class="card">
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Options</h6>
                                                        <form
                                                            action="{{ route('questions.options.store', ['question' => $question->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" name="text"
                                                                    id="o_text" placeholder="Add option">
                                                                <label for="state">is this right answer?</label>
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="is_right" id="state">
                                                            </div>
                                                            <button type=" submit" class="btn btn-primary">Add
                                                                Option</button>
                                                        </form>
                                                        <ul class="list-group">
                                                            @foreach ($question->options as $option)
                                                                <li
                                                                    class="list-group-item justify-content-between d-flex">
                                                                    <div class="lead">
                                                                        {{ $option->text }}
                                                                        @if ($option->is_right)
                                                                            <span
                                                                                class="badge rounded-pill bg-success text-dark">Correct
                                                                                Answer</span>
                                                                        @endif
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('options.destroy', ['option' => $option->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="submit" class="btn btn-danger"
                                                                            name="delete" value="Delete"
                                                                            onclick="return confirm('are you sure you want to delte this option?');">
                                                                    </form>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
