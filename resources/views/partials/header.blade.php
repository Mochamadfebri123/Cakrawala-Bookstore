<header>
    <nav class="header-nav navbar navbar-expand-lg navbar-dark bg-primary-light">
        {{-- <div class="container">
            <div class="container-fluid">
                <div class="row d-flex align-items-center justify-content-between gap-3">
                    <div class="col">
                        <a class="logo navbar-brand" href="/home">
                            <img src="pos/assets/img/brand.svg" alt="">
                            <span>{{ config('app.name') }}</span>
                        </a>
                    </div>
                    <div class="col col-lg-6">
                        <div class="input-group rounded">
                            <input class="form-control rounded" type="search" aria-label="Search"
                                aria-describedby="search-addon" placeholder="Search" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col mx-auto">
                        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                            type="button" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item me-2 nav-icon">
                                    <a class="nav-link" href="/shop-register"><i class="fa-solid fa-store fa-lg"
                                            style="color: #43aaff;"></i></a>
                                </li>
                                <li class="nav-item me-2 nav-icon me-auto">
                                    <a class="nav-link cart" href="/cart"><i
                                            class="fa-solid fa-cart-shopping fa-lg"></i></a>
                                </li>

                                <div class="vr border-2"></div>
                                <li class="nav-item dropdown mx-auto">
                                    <a class="nav-link nav-profile d-flex align-items-center pe-0"
                                        data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        <img class="rounded-circle"
                                            src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile">
                                        <span class="d-none d-md-block ps-2 user-name fw-bold" for="profile-btn"
                                            style="font-size: 16px">{{ auth()->user()->username }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <div class="container d-flex justify-content-center">
                                            <div class="card profile-area shadow-none">
                                                <div class="top-container mt-3">
                                                    <img class="img-fluid profile-image"
                                                        src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                        width="50">
                                                    <div class="row ms-2 mb-2">
                                                        <h5 class="col name">
                                                            @if (auth()->user()->nickname === null)
                                                                {{ auth()->user()->username }}
                                                            @else
                                                                {{ auth()->user()->nickname }}
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="middle-container d-flex align-items-center mt-3 p-2">
                                                    <div class="dollar-div px-3">
                                                        <div class="rounded-circle bg-light px-3 py-2"><i
                                                                class="fa-solid fa-rupiah-sign"
                                                                style="color: #43aaff;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column text-start ms-2">
                                                        <span class="current-balance">Current Balance</span>
                                                        <span class="amount"><span
                                                                class="dollar-sign">Rp</span>188511563</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <li>
                                            <form action="/edit-profile" method="GET">
                                                @csrf
                                                <button class="dropdown-item" type="submit"><i
                                                        class="fa-solid fa-pen-to-square fa-lg me-3"
                                                        style="color: #43aaff;"></i>Edit
                                                    Profile</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit" onclick="logout()"><i
                                                        class="fa-solid fa-right-from-bracket fa-lg me-3 mb-3"
                                                        style="color: #43aaff;"></i>Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="container-fluid">
                <div class="row d-flex align-items-center justify-content-between ">
                    <!-- Left elements -->
                    @if (Route::has('login'))
                        @auth
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                        <a class="ms-md-2 logo navbar-brand" href="/dashboard">
                            <img src="{{asset('admincss/assets/img/logo.png')}}" width="200" height="100" />
                            <span style="color:#588200"></span>
                        </a>
                    </div>
                    <!-- Left elements -->
                    @else
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
                        <a class="ms-md-2 logo navbar-brand" href="/">
                            <img src="{{asset('admincss/assets/img/logo.png')}}" width="200" height="100" />
                            <span style="color:#588200"></span>
                        </a>
                    </div>
                    @endauth
                    @endif
                    <!-- Center elements -->
                    <div class="col-md-4">
                        <form class="d-flex input-group w-auto my-auto mb-3 mb-md-0" method="get" action="{{url('cari_produkuser')}}">
                            <input class="form-control rounded" type="search" aria-label="Search" name="search"
                                aria-describedby="search-addon" placeholder="Cari Produk, Judul Buku, Penulis" />
                            <span class="input-group-text border-0" id="search-addon">
                              <i class="fas fa-search"></i>
                            </span></a>
                        </form>
                    </div>
                    <!-- Center elements -->

                    <!-- Right elements -->
                    @if (Route::has('login'))
                        @auth
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                        <div class="d-flex">
                            <!-- Cart -->
                            <a class="nav-link cart mt-2 me-3" href="{{url('keranjang')}}">
                                <span><i style="color:#588200" class="bi bi-cart-fill fs-5"></i></span>
                                <span class="badge rounded-pill badge-notification bg-danger">{{$count_c}}</span>
                            </a>

                            <!-- Dashboard -->
                            <a class="nav-link cart mt-2 me-3 fs-5" href="{{url('bookmark')}}">
                                <span><i style="color:#588200" class="bi bi-bookmark-fill fs-5"></i></span>
                                <span class="badge rounded-pill badge-notification bg-danger">{{$count_b}}</span>
                            </a>

                            <!-- User -->
                            <div class="dropdown mt-2">
                                <a class="text-reset dropdown-toggle d-flex align-items-justify hidden-arrow"
                                    id="navbarDropdownMenuLink" data-mdb-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false">
                                    <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                        alt="" height="32" loading="lazy" />
                                    <span class="d-none d-md-block ps-2 user-name fw-bold" for="profile-btn"
                                        style="font-size: 16px ">{{ auth()->user()->username }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                            <li>
                                        <form action="{{url('orderuser')}}" method="GET">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i
                                                    class="fa-solid fa-shopping-bag fa-lg me-3"
                                                    style="color: #43aaff;"></i>Pesanan Saya</button>
                                        </form>
                                    </li>
                                            
                                    <li>
                                        
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i
                                                    class="fa-solid fa-pen-to-square fa-lg me-3"
                                                    style="color: #43aaff;"></i>Edit
                                                Profile</button>
                                     
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit" onclick="logout()"><i
                                                    class="fa-solid fa-right-from-bracket fa-lg me-3 mb-3"
                                                    style="color: #43aaff;"></i>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @else
                    <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                        <div class="d-flex">
                        <div class="user_option">
                            <a href="/login">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span>Login</span>
                            </a>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @endif
                    <!-- Right elements -->
                </div>
            </div>
        </div>
    </nav>
</header>
