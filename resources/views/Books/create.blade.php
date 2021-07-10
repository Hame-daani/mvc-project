<x-base>
    <h1>creating new book:</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="title">title:</label>
        <input type="text" name="title" id="title">
        <br>
        <br>
        <label for="info">info:</label>
        <textarea name="info" id="info" cols="100" rows="5"></textarea>
        <br>
        <br>
        <label for="title">link:</label>
        <input type="url" name="link" id="link">
        <br>
        <br>
        <label for="title">img url:</label>
        <input type="url" name="img" id="img">
        <br>
        <br>
        <input type="submit" value="create">
    </form>
</x-base>
