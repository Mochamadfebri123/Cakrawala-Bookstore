<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.css')
</head>

<body>
  @include('admin.header')
  
  @include('admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">

<!-- Order -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <a href="{{url('order')}}"><div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Order</div></a>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data_a}}</div>
            </div>

          </div>
        </div>
        <div class="col-auto">
          <i class="bi bi-cart-plus fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

   <!-- Products -->
  
   <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2"> 
          <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="{{url('produk')}}"><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Products</div></a>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data_b}}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

       <!-- Category -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="{{url('kategori')}}"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Category</div></a>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data_c}}</div>
              </div>
              <div class="col-auto">
                <i class="bi bi-diagram-3 fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
      <!-- Order -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <a href="{{url('order', "new")}}"> <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Order</div></a>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data_n}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Order -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <a href="{{url('order', 'process')}}"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Processing Order</div></a>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data_p}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-spinner fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Order -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Delivered Order</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$data_d}}</div>
                  </div>
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-check fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      

         

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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