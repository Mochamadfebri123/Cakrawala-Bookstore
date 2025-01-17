<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;1,500;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <!-- Template POS CSS File -->
    <link href="/pos/assets/css/style.css" rel="stylesheet">
  
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/responsive.css')}}">

    <!-- Favicons -->
    <link href="/pos/assets/img/buku1.png" rel="icon">
    <link href="/pos/assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="{{asset('/frontend/css/jquery-ui.css')}}">
    <!-- Vendor CSS Files -->
    <link href="/pos/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <!-- HEADER -->
    @include('partials.header')
    <!-- MAIN CONTENT -->
    <div class="container mt-4 mb-3 bg-white text-dark">
        <div class="container-fluid">
            @yield('profile')
            @yield('editprofile')
            @yield('cart')
            @yield('promo')
            @yield('categories')
            @yield('recommendations')
            @yield('deskripsi')
            @yield('review')
            @yield('order')
            @yield('detail')
        </div>
    </div>
    <!-- FOOTER -->
    @include('partials.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/f7402773f7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/script.js"></script>
    <script src="pos/assets/js/custom.js"></script>
    <script src="pos/assets/js/cart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
    <script type="text/javascript">
        function logout() {

            swal({

                title: "Logout Succeed!",

                text: "You have exited the app.",

                icon: "success",

                button: true

            });

        }
    </script>

	</script>

</body>

</html>