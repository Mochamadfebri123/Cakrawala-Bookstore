<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.css')

 <style type="text/css">
  
  .div_center{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
  }

 </style>
</head>

<body>
<header id="header" class="header fixed-top d-flex align-items-center">
<div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('admincss/assets/img/logo.png')}}" alt="" width="250" height="175">
        <span class="d-none d-lg-block"></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="get" action="{{url('cari_produk')}}">
        @csrf
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
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
  
  @include('admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><a href="produk">Produk</a></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active"><a href="produk">Produk</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section dashboard">
      <div class="row">

            <!-- Kategori -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Produk</h5>

                  <table id="datatable" class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col"><center>Gambar</center></th>
                        <th scope="col"><center>Judul</center></th>
                        <th scope="col"><center>Penulis</center></th>
                        <th scope="col"><center>Deskripsi</center></th>
                        <th scope="col"><center>Harga</center></th>
                        <th scope="col"><center>Kategori</center></th>
                        <th scope="col"><center>Stok</center></th>
                        <th scope="col"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($product as $products)
                      <tr>
                        <th scope="row"><center><a href="#"><img src="products/{{$products->gambar}}" alt=""></a></center></th>
                        <td><center><a href="#" class="text-primary fw-bold">{!!Str::limit($products->judul,16)!!}</a></center></td>
                        <td><center><a href="#" class="text-primary fw-bold">{!!Str::limit($products->penulis,17)!!}</a></center></td>
                        <td><center><a href="#" class="text-primary fw-bold">{!!Str::limit($products->deskripsi,25)!!}</a></center></td>
                        <td><center><a href="#" class="text-primary fw-bold">Rp. {{number_format($products->harga,0,',','.')}}</a></center></td>
                        <td><center><a href="#" class="text-primary fw-bold">{{$products->kategori}}</a></td>
                        <td><center><a href="#" class="text-primary fw-bold">{{$products->jumlah}}</a></center></td>
                        <td><center>
                        <div class="flex items-center justify-center space-x-4 text-sm">
                        <a href="{{url('edit_produk',$products->id)}}" class="btn btn-xs btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                        </a>
                        <a href="{{url('hapus_produk',$products->id)}}" 
                        class="btn btn-xs btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                      </center></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
             
              <div class="div_center">

              {{$product->onEachSide(1)->links()}}
              
            </div>
              
            </div><!-- End Kategori -->

      </div>
    </section>


  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="{{asset('admincss/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admincss/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admincss/assets/js/main.js')}}"></script>

</body>
</html>
