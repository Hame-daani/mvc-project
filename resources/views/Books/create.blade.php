<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">Create New Book</h1>
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="info" class="form-label">Info</label>
                                <textarea class="form-control" name="info" id="id" cols="100" rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="url" class="form-control" name="link" id="link">
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image Link</label>
                                <input type="url" class="form-control" name="img" id="img">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
