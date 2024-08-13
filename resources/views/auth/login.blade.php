<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;1,500;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="pos/assets/img/buku1.png" rel="icon">
    <link href="pos/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body class="bg-primary bg-opacity-25">
<div class="row justify-content-center">

<div class="d-flex justify-content-center py-4">
    <a class="logo d-flex align-items-center" href="/">
        <span class="d-none d-lg-block fs-1 fw-bold fst-italic">{{ config('app.name') }}</span>
    </a>
</div><!-- End Logo -->

@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
    </div>
@endif

    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-3 position-absolute top-50 start-50 translate-middle">
                <div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Please Login</h5>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('login_store_name') is-invalid @enderror" id="registerEmail"
                    name="email" type="text" :value="old('email)" required />
                <label class="form-label" for="email">Email</label>
                @error('login_store_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('login_store_password') is-invalid @enderror"
                    id="registerPassword" name="password"  type="password" required />
                <label class="form-label" for="password">Password</label>
                @error('login_store_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary btn-block mb-3 fw-bold text-light"
                type="submit">{{ __('SUBMIT') }}</button>
        </form>
        <div class="col-12">
            <p class="small mb-0">Not have an account? <a href="/register">Register</a></p>
        </div>
    </div>
</div>
<div class="credits text-center">
    Designed by <a href="/">cakrawala</a>
</div>
</div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <script src="https://kit.fontawesome.com/f7402773f7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>

</html>

