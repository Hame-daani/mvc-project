<x-base>
    @foreach ($users as $user)
        <ul>
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                @if ($user->is_active)
                    &#9989;
                @else
                    &#10060;
                @endif
                @if ($user->is_admin)
                    &#128293;
                @else
                    &#9872;
                @endif
                <form action="{{ route('users.toggle', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <input type="submit" name="toggle" value="{{ $user->is_active ? 'deactive' : 'activate' }}">
                </form>
                <form action="{{ route('users.admin', ['user' => $user->id]) }}" method="post">
                    @csrf
                    <input type="submit" name="toggle" value="{{ $user->is_admin ? 'unadmin' : 'admin' }}">
                </form>
        </ul>
    @endforeach
</x-base>
