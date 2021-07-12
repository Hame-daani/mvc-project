<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- font --}}
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v29.1.0/dist/font-face.css" rel="stylesheet"
        type="text/css" />
    <style>
        * {
            font-family: 'Vazir', sans-serif;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="{{ route('login') }}" method="POST" class="row g-3">
                        @csrf
                        <h4>خوش آمدید</h4>
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
                            <label>ایمیل</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <label>پسورد</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-end">ورود</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">هنوز ثبت‌نام نکردید؟ <a href="{{ route('register') }}">همین الان
                                بکن</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
