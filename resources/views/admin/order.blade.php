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

            <!-- Kategori -->
            <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <div class="card-body pb-0">
                    <h5 class="card-title">Produk</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                 
                                    <th><b><center>NO</center></b></th>
                                    <th><b><center>ORDER ID</center></b></th>
                                    <th><b><center>NAMA</center></b></th>
                                    <th><b><center>METODE PEMBAYARAN</center></b></th>
                                    <th><b><center>STATUS PEMBAYARAN</center></b></th>
                                    <th><b><center>TANGGAL PESANAN</center></b></th>
                                    <th><b><center>STATUS PESANAN</center></b></th>
                                    <th><b><center> AKSI </center></b></th>
                            
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($order as $orders)
                                    <tr>
                                        <td><center>{{$no++}} </center></td>
                                        <td><center>{{$orders->order_number}}</center></td>
                                        <td><center>{{$orders->first_name}} {{$orders->last_name}}</center></td>
                                        <td><center>{{$orders->payment_method}}</center></td>
                                        <td><center>{{$orders->payment_status}}</center></td> 
                                        <td><center>{{$orders->created_at}}</center></td>
                                      
                                        <td>
                                            @if($orders->status=='new')
                                            <center><span class="btn btn-primary">NEW</cente></span>
                                            @elseif($orders->status=='process')
                                            <center><span class="btn btn-warning">PROCESSING</center></span>
                                            @elseif($orders->status=='delivered')
                                            <center><span class="btn btn-success">DELIVERED</center></span>
                                            @else
                                            <center><span class="btn btn-danger">{{$orders->status}}</center></span>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="{{url('lihat',$orders->order_number)}}" class="btn btn-warning btn-sm " style="height:30px; width:35px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="bi bi-eye"></i></a>
                                        <a href="{{url('edit',$orders->order_number)}}" class="btn btn-primary btn-sm mt-2" style="height:30px; width:35px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="bi bi-pen"></i></a>
                                        <a href="{{url('hapus_order',$orders->order_number)}}" class="btn btn-danger  btn-sm mt-2" style="height:30px; width:35px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="bi bi-trash"></i></a>

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="div_center">

              {{$order->onEachSide(1)->links()}}

              </div>
                </div>
            </div>
           


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
