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

    
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">

                        
                        @foreach($order as $order)
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Detail Pesanan</h5>
                                <hr>
                                <h6>Nomor Pesanan: {{$order->order_number}} </h6>
                                <h6>Tanggal Pesanan: {{$order->created_at}}</h6>
                                <h6>Metode Pembayaran: {{$order->payment_method}}</h6>
                                <h6>Status Pembayaran: {{$order->payment_status}}</h6>
                                @if($order->status == 'new')
                                <h6 class="border p-2 text-primary">
                                    Status  Pesanan: DITERIMA<span class="text-uppercase"></span>
                                </h6>
                                @elseif($order->status =='process')
                                <h6 class="border p-2 text-warning">
                                    Status  Pesanan: DALAM PERJALANAN<span class="text-uppercase"></span>
                                </h6>
                                @else
                                <h6 class="border p-2 text-success">
                                    Status  Pesanan: PAKET TELAH SAMPAI<span class="text-uppercase"></span>
                                </h6>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>Detail Pelanggan: </h5>
                                <hr>
                                <h6>Nama: {{$order->first_name}} {{$order->last_name}}</h6>
                                <h6>Email: {{$order->email}}</h6>
                                <h6>Nomor Telepon: {{$order->phone}}</h6>
                                <h6>Alamat: {{$order->address}}</h6>
                                <h6>Kode Pos: {{$order->post_code}}</h6>
                            </div>
                        </div>
                        @endforeach
   
                        
                        <br/>
                        <h5>Barang Pesanan</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th><b><center>Gambar</center></b></th>
                                    <th><b><center>Judul Buku</center></b></th>
                                    <th><b><center>Penulis</center></b></th>
                                    <th><b><center>Harga</center></b></th>
                                    <th><b><center>Jumlah</center></b></th>
                                    <th><b><center>Total</center></b></th>
                                    
                                </thead>
                                <tbody>
                                @php
                                $total_harga=0;

                                @endphp
                                 @foreach($data as $data)
                                    <tr>
                                        @php
                                        $harga_diskon=($data->product->harga-(($data->product->harga*$data->product->diskon)/100));
                                        @endphp
                                        <td>
                                        <img width="100" src="/products/{{$data->product->gambar}}"> </td>
                                        <td>{{$data->product->judul}}</td>
                                        <td>{{$data->product->penulis}}</td>
                                        <td>Rp. {{number_format($harga_diskon,0,',','.')}}</td>
                                        <td>{{$data->quantity}}</td>
                                        <td>Rp. {{number_format($data->total_amount,0,',','.')}}</td>
                                        @php
                                            $total_harga += $data->total_amount;
                                        @endphp
                                    </tr>
                                 @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Harga</td>
                                        <td colspan="1" class="fw-bold">Rp. {{number_format($total_harga,0,',','.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                

                    </div>
                </div>
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
