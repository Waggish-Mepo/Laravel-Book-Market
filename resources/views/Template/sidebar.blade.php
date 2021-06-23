<aside class="main-sidebar sidebar-success-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel bg-grey mt-4 pb-1 mb-3 d-flex">
        <div class="info">
          <h5 class="d-block fw-normal">Halo <span class="text-wrap fw-bold">{{auth()->user()->name}}</span>!</h5>
        </div>
      </div>
      <hr>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview" >

              <li class="nav-item" name="inputbuku">
                <a href="{{route('index')}}" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <hr>

              @if(auth()->user()->level=="admin")
              <li class="nav-item">
                <a href="{{route('pageInputDistributor')}}" class="nav-link">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Input Distributor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pageInputBuku')}}" class="nav-link">
                  <i class="fa fa-book-medical nav-icon"></i>
                  <p>Input Buku</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('indexInputPasokBuku')}}" class="nav-link">
                  <i class="fa fa-book-medical nav-icon"></i>
                  <p>Input Pasok Buku</p>
                </a>
              </li>
              
              <hr>

              <li class="nav-item">
                <a href="{{route('lapBukuSemua')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Semua Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('indexPasokBuku')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Semua Pasok Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bukuTerlaris')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Buku Terlaris</p>
                </a>
              </li>
              @endif

              @if(auth()->user()->level=="kasir")
              <li class="nav-item">
                <a href="{{route('penjualan')}}" class="nav-link">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('transaksi-buku')}}" class="nav-link">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>Transaksi Penjualan</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{route('faktur')}}" class="nav-link">
                  <i class="fa fa-receipt nav-icon"></i>
                  <p>Faktur</p>
                </a>
              </li>
              @endif

              @if(auth()->user()->level=="manager")
              <li class="nav-item">
                <a href="{{route('faktur')}}" class="nav-link">
                  <i class="fa fa-receipt nav-icon"></i>
                  <p>Faktur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('penjualan')}}" class="nav-link">
                  <i class="fa fa-shopping-cart nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{route('lapBukuSemua')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Semua Data Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('indexPasokBuku')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Semua Pasok Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('bukuTerlaris')}}" class="nav-link">
                  <i class="fa fa-book nav-icon"></i>
                  <p>Buku Terlaris</p>
                </a>
              </li>
              <hr>
              <li class="nav-item">
                <a href="{{route('profile')}}" class="nav-link">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Ubah Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add-user')}}" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
              @endif

            </ul>
          </li>
          <hr>
          <li class="nav-item">
            <a href="{{route('changePw')}}" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Ganti Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>

    </div>

  </aside>