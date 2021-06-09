Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed-top">
  <div class="container">
     <!--  <a href="../../index3.html" class="navbar-brand">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
    -->
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{route('dashboardAll')}}" class="nav-link">Home</a>
        </li>
        @if(Route::is('dashboard') or Route::is('dashboardAll'))
        <li class="nav-item">
          <a href="#berita" class="nav-link">Berita</a>
        </li>
        @endif
        @if(!Auth::check())
        <!-- jika belum login -->
        <li class="nav-item">
          <a href="{{route('daftar')}}" class="nav-link">Pendaftaran</a>
        </li>
         <li class="nav-item">
          <a href="{{route('viewKonfirmasi')}}" class="nav-link">Konfirmasi</a>
        </li>
        <li class="nav-item">
          <a href="{{route('viewSaran')}}" class="nav-link">Saran</a>
        </li>
        @else
        <!-- jika sudah login -->
        <li class="nav-item">
          <a href="{{route('daftarAll')}}" class="nav-link">Data Pendaftar</a>
        </li>
        <li class="nav-item">
          <a href="{{route('viewSaranAll')}}" class="nav-link">Kotak Saran</a>
        </li>
         <li class="nav-item">
          <a href="#" class="nav-link">Hi, {{Auth::user()->name}}</a>
        </li>
        @endif
       
      </ul>


    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
     <!-- SEARCH FORM -->
     <form class="form-inline ml-0 ml-md-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    @if(Auth::check())
    <li class="nav-item">
      <a href="{{route('logout')}}" onclick="confirm('Are you sure to Logout?')" class="nav-link">Logout</a>
    </li>
    @else
    <li class="nav-item">
      <a href="{{route('dashboard')}}" class="nav-link">Login</a>
    </li>
    @endif
  </ul>
</div>
</nav>
  <!-- /.navbar