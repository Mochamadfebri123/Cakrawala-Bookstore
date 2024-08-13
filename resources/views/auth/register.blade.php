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
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4 position-absolute top-50 start-50 translate-middle">
                <div class="row justify-content-center">

<div class="d-flex justify-content-center py-4">
    <a class="logo d-flex align-items-center" href="/register">
        <span class="d-none d-lg-block fs-1 fw-bold fst-italic">{{ config('app.name') }}</span>
    </a>
</div><!-- End Logo -->

<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Create your Account</h5>
            
        </div>
        <form method="POST" action="{{ route('register') }}">
         @csrf

            <!-- Store Name input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('name') is-invalid @enderror" id="registerName" name="name"
                    type="text" value="{{ old('name') }}" required />
                <label class="form-label" for="registerName">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Description input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('email') is-invalid @enderror" id="registerEmail"
                    name="email" type="email" value="{{ old('email') }}" required />
                <label class="form-label" for="registerDesc">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('phone') is-invalid @enderror" id="registerPhone"
                    name="phone" type="text" value="{{ old('phone') }}" required />
                <label class="form-label" for="registerPhone">Phone</label>
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input class="form-control @error('Address') is-invalid @enderror" id="registerAddress"
                    name="address" type="text" required />
                <label class="form-label" for="registerAddress">Address</label>
                @error('Address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input class="form-control @error('password') is-invalid @enderror" id="registerPassword"
                    name="password" type="password" required />
                <label class="form-label" for="registerPassword">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <input class="form-control @error('password') is-invalid @enderror" id="registerPassword"
                    name="password_confirmation" type="password" required />
                <label class="form-label" for="registerPassword">Password Confirmation</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" id="acceptTerms" name="terms" type="checkbox" value=""
                    required>
                <label class="form-check-label" for="acceptTerms">I agree and accept
                    the
                    <a href="#">terms and conditions</a></label>
                <div class="invalid-feedback">You must agree before submitting.
                </div>
            </div>

            <button class="btn btn-primary btn-block mb-3 fw-bold text-light"
                type="submit">{{ __('SUBMIT') }}</button>

        </form>
        <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
        </div>
    </div>
</div>

<div class="credits text-center">
    Designed by <a href="/kyriten">cakrawala</a>
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



