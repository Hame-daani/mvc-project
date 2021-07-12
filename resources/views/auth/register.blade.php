<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="{{ route('register') }}" method="POST" class="row g-3">
                        @csrf
                        <h4>Join us</h4>
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Validation Errors -->
                        @if (count($errors) != 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <div class="col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required
                                autocomplete="new-password">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="password confirmation" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">Register</button>
                        </div>
                    </form>
                    <hr class="mt-4">

                </div>
            </div>
        </div>
    </div>
</body>

</html>
