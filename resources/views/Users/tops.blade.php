<x-base>
    <ol>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->scores }}
            </li>
        @endforeach
    </ol>
</x-base>
