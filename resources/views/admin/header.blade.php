<header id="header" class="header fixed-top d-flex align-items-center">
<div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('admincss/assets/img/logo.png')}}" alt="" width="250" height="175">
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="">
        @csrf
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

         <li>
         <form action="/logout" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit" onclick="logout()"><i
                                                    class="bi bi-box-arrow-right fa-solid fa-right-from-bracket fa-lg"
                                                    style="color: #43aaff;"></i>Logout</button>
                                        </form>
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
    </header><!-- End Header --><i class=""></i>