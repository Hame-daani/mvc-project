<x-base>
    <x-slot name="title">
        Top Users
    </x-slot>
    <div class="card">
        <div class="row g-0 justify-content-center">
            <div class="col-md-8">
                <div class="card-body row g-0  justify-content-center">
                    <h2 class="card-title">ده کاربر برتر در سایت</h2>
                    <div class="col-md-7">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
