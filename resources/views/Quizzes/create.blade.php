<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">ایجاد کوییز جدید</h1>
                        <p>این کوییز برای کتاب {{ $book->title }} ایجاد خواهد شد</p>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            این کوییز پس از ایجاد شدن غیرفعال خواهد بود و پس از بررسی مدیر سایت، فعال خواهد شد.
                        </div>
                        <form action="{{ route('books.quizzes.store', ['book' => $book->id]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان کوییز</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <button type="submit" class="btn btn-primary">ایجاد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
