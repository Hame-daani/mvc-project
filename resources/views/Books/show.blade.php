<x-base>
    <x-slot name="title">
        Show Book
    </x-slot>
    <div class="card">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="{{ $book->img }}" alt="">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $book->title }}</h2>
                    <p class="card-text">{{ $book->info }}</p>
                    <p class="card-text"><small class="text-muted">آخرین بار در تاریخ {{ $book->updated_at }} آپدیت
                            شده است</small></p>
                    <a href="{{ $book->link }}" class="btn btn-primary" role="button">خواندن کتاب</a>
                    @can('admin')
                        <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-secondary"
                            role="button">ویرایش کتاب</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="row g-0 justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title">کوییزها</h5>
                        <p class="card-text">
                            @if (count($book->quizzes) == 0)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    هیچ کوییزی موجود نیست
                                </div>
                            @else
                                <ul class="list-group">
                                    @foreach ($book->quizzes as $quiz)
                                        @can('view', $quiz)
                                            <li
                                                class="list-group-item list-group-item-action justify-content-between d-flex">
                                                <a
                                                    href="{{ route('quizzes.show', ['quiz' => $quiz->id]) }}">{{ $quiz->title }}</a>
                                                <div>
                                                    تعداد تلاش‌های ثبت شده
                                                    <span
                                                        class="badge bg-primary rounded-pill">{{ $quiz->attempts->count() }}</span>
                                                </div>
                                            </li>
                                        @endcan
                                    @endforeach
                                </ul>
                            @endif
                        </p>
                        @auth
                            <a href="{{ route('books.quizzes.create', ['book' => $book->id]) }}" class="btn btn-primary"
                                role="button">ایجاد کوییز جدید</a>
                        @endauth
                </div>
            </div>
        </div>
    </div>
</x-base>
