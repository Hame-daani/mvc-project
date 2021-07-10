<x-base>
    @foreach ($books as $book)
        <ul>
            <li><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></td>
        </ul>
    @endforeach
    @can('admin')
        <a href="{{ route('books.create') }}">new book</a>
    @endcan
</x-base>
