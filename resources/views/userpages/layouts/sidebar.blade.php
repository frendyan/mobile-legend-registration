<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{URL::asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Elingo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 mb-3 d-flex">
      <div class="image">
        <img src="{{URL::asset('dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2 mt-2" alt="User Image">
      </div>
      <div class="info ml-1">
        <a href="#" class="d-block text-light">{{Auth::user()->name}}</a>
        @if(Auth::user()->utype==="SA")
        <p class="text-secondary">Super Admin</p>
        @endif
        @if(Auth::user()->utype==="ADM")
        <p class="text-secondary">Admin</p>
        @endif
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->                                
          @if(Auth::user()->utype==="SA")
          <li class="nav-header">MENUS</li>
           <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
          </li>
         <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Admins
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('createAdmin')}}" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Add New Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('indexAdmin')}}" class="nav-link">
                    <i class="fas fa-users-cog nav-icon"></i>
                    <p>All Admins</p>
                  </a>
                </li>                            
              </ul>
            </li> 
          @endif
          @if(Auth::user()->utype==="ADM")
          <li class="nav-header">MENUS</li>
           <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
           <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  CAT
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('indexFirstTest')}}" class="nav-link">
                  <i class="nav-icon fas fa-dot-circle"></i>
                  <p>Kategori 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('indexSecondTest')}}" class="nav-link">
                    <i class="nav-icon fas fa-dot-circle"></i>
                    <p>Kategori 2</p>
                  </a>
                </li>   
                <li class="nav-item">
                  <a href="{{route('indexThirdTest')}}" class="nav-link">
                    <i class="nav-icon fas fa-dot-circle"></i>
                    <p>Kategori 3</p>
                  </a>
                </li>    
                <li class="nav-item">
                  <a href="{{route('settings.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-dot-circle"></i>
                    <p>Pengaturan</p>
                  </a>
                </li>                            
              </ul>
            </li>        
          <li class="nav-item has-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Peserta CAT
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('users.create')}}" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p>Tambah Baru</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Semua Peserta</p>
                  </a>
                </li>                                                                    
              </ul>
            </li>                                       
            @endif          
            <li class="nav-header">ACCOUNT</li>                   
            <li class="nav-item">
              <a href="{{ route('logout') }}" onclick="return confirm('Are you sure to Logout?')" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
