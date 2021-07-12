<x-base>
    <ul class="list-group">
        @foreach ($books as $book)
            <li class="list-group-item list-group-item-action"><a
                    href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a>
            </li>
        @endforeach
    </ul>
    <br>
    @can('admin')
        <a class="btn btn-primary" href="{{ route('books.create') }}">ایجاد کتاب جدید</a>
    @endcan
</x-base>
