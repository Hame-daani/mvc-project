<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">Edit {{ $user->name }} Info</h1>
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="{{ $user->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
