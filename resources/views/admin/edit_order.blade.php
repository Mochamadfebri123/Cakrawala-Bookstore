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
      <h1>Edit Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="kategori"></a>Kategori</li>
          <li class="breadcrumb-item active">Edit Kategori</li>
        </ol>
      </nav>
    </div>
    <section class="section">
    <form action="{{url('update_order',$order->order_number)}}" method="POST" enctype="multipart/form-data">
                @csrf
        <label for="status">Status :</label>
        <select name="status" id="" class="form-control">
          <option value="new">New</option>
          <option value="process">Processing</option>
          <option value="delivered">Delivered</option>
          <option value="cancel">Cancel</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
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