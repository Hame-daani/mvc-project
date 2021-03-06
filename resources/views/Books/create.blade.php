<x-base>
    <x-slot name="title">
        Create Book
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">ایجاد کتاب جدید</h1>
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">عنوان کتاب</label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="info" class="form-label">اطلاعات کتاب</label>
                                <textarea class="form-control" name="info" id="id" cols="100" rows="5"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">لینک کتاب</label>
                                <input type="url" class="form-control" name="link" id="link" required>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">لینک کاور کتاب</label>
                                <input type="url" class="form-control" name="img" id="img" required>
                            </div>
                            <button type="submit" class="btn btn-primary">ایجاد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
