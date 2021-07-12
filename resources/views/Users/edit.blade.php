<x-base>
    <div class="container">
        <div class="card">
            <div class="row g-0 justify-content-center">
                <div class="col-md-5">
                    <div class="card-body">
                        <h1 class="card-title">ویرایش اطلاعات کاربر {{ $user->name }}</h1>
                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">آدرس ایمیل</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="{{ $user->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary">آپدیت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
