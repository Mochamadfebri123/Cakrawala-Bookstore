<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-tags"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('kategori')}}">
              <i class="bi bi-circle"></i><span>Data Kategori</span>
            </a>
          </li>
          <li>
            <a href="{{url('tambah_kategori')}}">
              <i class="bi bi-circle"></i><span>Tambah Kategori</span>
            </a>
          </li>
        
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-boxes"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{url('produk')}}">
              <i class="bi bi-circle"></i><span>Data Produk</span>
            </a>
          </li>
          <li>
            <a href="{{url('tambah_produk')}}">
              <i class="bi bi-circle"></i><span>Tambah Produk</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('order')}}">
          <i class="bi bi-cart-plus"></i>
          <span>Pesanan</span>
        </a>
      </li>

     

    </ul>

  </aside><!-- End Sidebar-->