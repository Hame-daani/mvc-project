<x-base>
    <div class="row g-0 justify-content-center">
        <ul class="list-group col-md-8">
            @foreach ($users as $user)
                <li
                    class="list-group-item justify-content-between d-flex @unless($user->is_active) list-group-item-danger @endunless">
                    <div>
                        <a href="{{ route('users.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                        &nbsp;
                        @if ($user->is_admin)
                            <span class="badge rounded-pill bg-warning text-dark">Admin</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-5 col-md-6">
                            <form action="{{ route('users.toggle', ['user' => $user->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn @if ($user->is_active) btn-danger @else btn-success @endif" name="toggle"
                                value="{{ $user->is_active ? 'deactive' : 'activate' }}">
                            </form>
                        </div>
                        <div class="col-5 col-md-6">
                            <form action="{{ route('users.admin', ['user' => $user->id]) }}" method="post">
                                @csrf
                                <input type="submit" class="btn @if ($user->is_admin) btn-secondary @else btn-warning @endif" name="toggle"
                                value="{{ $user->is_admin ? 'unadmin' : 'admin' }}">
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-base>
