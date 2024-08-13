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
      <h1>Edit Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
          <li class="breadcrumb-item active">Edit Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
            <form action="{{url('update_produk',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        @csrf
                        <div class="card">
                            <div class="card-body">

                                {{-- Image --}}
                                <h5 class="card-title fs-4">Ganti Gambar Produk
                                    <br>
                                   
                                </h5>

                                <div>
                                <div class="mb-4 d-flex justify-content-center">
                                        <img id="imgPreview"
                                            src="/products/{{$data->gambar}}"
                                            alt="image placeholder" style="width: 300px;" />
                                    </div>
                                   
                                   
                                    <div class="d-flex justify-content-center">
                                        
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                {{-- End Image --}}

                                </div>
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fs-4">Detail Produk</h5>

                                <!-- Detail Product Form -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Informasi</label>
                                    <div class="col-sm-9">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="judul" type="text" required
                                                placeholder="Masukkan Judul Buku" value="{{$data->judul}}">
                                            <label for="floatingInput">Judul Buku</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="penulis" type="text" required
                                                placeholder="Masukkan Judul Buku" value="{{$data->penulis}}">
                                            <label for="floatingInput">Penulis</label>
                                        </div>
                    
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="floatingPassword" name="deskripsi" required
                                            placeholder="Masukkan Deskripsi">{{$data->deskripsi}}</textarea>
                                            <label for="floatingPassword">Deskripsi Buku</label>
                                        </div>
                                        {{-- <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example">
                                                <option selected>None</option>
                                                <option value="1">Novel</option>
                                                <option value="2">Biography</option>
                                                <option value="3">Comics</option>
                                                <option value="4">Magazine</option>
                                                <option value="5">Dictionary</option>
                                                <option value="6">Script</option>
                                                <option value="7">Manga</option>
                                                <option value="8">Encyclopedia</option>
                                            </select>
                                            <label for="floatingSelect">Select Category</label>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-3 col-form-label mb-3">Kategori</label>
                                    <div class="col-sm-2 mt-2">
                                            <select name="kategori" required>
                                                <option disabled>{{$data->kategori}}</option>
                                                @foreach($category as $category)
                                                <option value="{{$category->nama_kategori}}">{{$category->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                <div class="row mb-5">

                                    <label class="col-sm-2 col-form-label">Stock & Price</label>
                                    <div class="col-sm-10">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp</span>
                                            <input class="form-control" name="harga" type="text"
                                                placeholder="Masukkan Harga (Rupiah)" value="{{$data->harga}}">
                                            <span class="input-group-text border-0">.00</span>
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Diskon</span>
                                            <input class="form-control" name="diskon" type="text"
                                                placeholder="Masukkan Harga (Rupiah)" value="{{$data->diskon}}">
                                            <span class="input-group-text border-0">%</span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="jumlah" type="text"
                                                placeholder="Enter stock of product" value="{{$data->jumlah}}">
                                            <label for="floatingInput">Stok</label>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="text-end">
                                    <button class="btn btn-danger fw-bold text-light" id="reset"
                                        type="reset">{{ __('RESET') }}</button>
                                    <button class="btn btn-primary fw-bold text-light" id="submit"
                                        type="submit">{{ __('SIMPAN') }}</button>
                                </div>

                                <!-- End General Form Elements -->

                            </div>

                        </div>

                    </div>
                </div>
            </form>
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