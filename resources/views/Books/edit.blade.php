<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">ویرایش کتاب</h1>
                        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="{{ $book->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="info" class="form-label">اطلاعات</label>
                                <textarea class="form-control" name="info" id="id" cols="100" rows="5"
                                    placeholder="{{ $book->info }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">لینک کتاب</label>
                                <input type="url" class="form-control" name="link" id="link"
                                    placeholder="{{ $book->link }}">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">لینک کاور کتاب</label>
                                <input type="url" class="form-control" name="img" id="img"
                                    placeholder="{{ $book->img }}">
                            </div>
                            <button type="submit" class="btn btn-primary">آپدیت</button>
                        </form>
                        <br>
                        <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" name="delete" value="حذف کتاب"
                                onclick="return confirm('آیا مطمئن هستید که می‌خواید این کتاب را حذف کنید؟');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
