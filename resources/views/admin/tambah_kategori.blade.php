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
      <h1>Tambah Kategori Baru</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
          <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <form action="{{url('prosestambah_kategori')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        @csrf
                        <div class="card">
                            <div class="card-body">

                                {{-- Image --}}
                                <h5 class="card-title fs-4">Upload Gambar Kategori
                                    <br>
                                   
                                </h5>

                                <div class="d-flex justify-content-center">
                                        
                                        <input type="file" name="image">
                                </div>
                                {{-- End Image --}}

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fs-4">Detail Kategori</h5>

                                <!-- Detail Product Form -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="nama_kategori" type="text"
                                                placeholder="Masukkan Kategori">
                                            <label for="floatingInput">Nama kategori</label>
                                    </div>
                                </div>

                                

                                <div class="text-end">
                                    <button class="btn btn-danger fw-bold text-light" id="reset"
                                        type="reset">{{ __('RESET') }}</button>
                                    <button class="btn btn-primary fw-bold text-light" id="submit"
                                        type="submit">{{ __('SUBMIT') }}</button>
                                </div>

                                <!-- End General Form Elements -->

                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </section>


  </main><!-- End #main -->

  

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