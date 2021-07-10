<x-base>
    </ol>
    <ol class="list-group list-group-numbered">
        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $user->name }}</div>
                </div>
                <span class="badge bg-primary rounded-pill">{{ $user->scores }}</span>
        @endforeach
    </ol>
</x-base>
