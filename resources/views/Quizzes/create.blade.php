<x-base>
    <h1>{{ $book->title }}</h1>
    <form action="{{ route('books.quizzes.store', ['book' => $book->id]) }}" method="post">
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <input type="submit" value="submit">
    </form>
</x-base>
