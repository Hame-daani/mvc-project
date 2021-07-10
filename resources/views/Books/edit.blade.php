<x-base>
    <h1>{{ $book->title }}</h1>

    <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <label for="delete">delete this book</label>
        <input type="submit" name="delete" value="Delete"
            onclick="return confirm('are you sure you want to delte this book?');">
    </form>

    <br>

    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title" placeholder="{{ $book->title }}">
        <br>
        <br>
        <label for="info">info:</label>
        <textarea name="info" id="info" cols="100" rows="5" placeholder="{{ $book->info }}"></textarea>
        <br>
        <br>
        <label for="title">link:</label>
        <input type="url" name="link" id="link" placeholder="{{ $book->link }}">
        <br>
        <br>
        <label for="title">img url:</label>
        <input type="url" name="img" id="img" placeholder="{{ $book->img }}">
        <br>
        <br>
        <input type="submit" value="update">
    </form>

    <hr>
</x-base>
