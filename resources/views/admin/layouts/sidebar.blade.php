  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{asset('images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <h4 class="brand-text font-weight-light">SIAK</h4>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('storage/foto/'.auth()->user()->foto)}}" class="img-circle img-thumbnail elevation-2 " alt="User Image" style="width:100px; height:50px;">
        </div>
        <div class="info">
          <p>{{ Auth::user()->username }}</p>
       
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link">
                <i class="fas fa-fw fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ route('admin.kk') }}" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Kelola KK</p>
                </a>
                <li class="nav-item">
                <a href="{{ route('admin.penduduk') }}" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Kelola Penduduk</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{ route('admin.pendatang') }}" class="nav-link">
                  <i class="fas fa-chart-pie nav-icon"></i>
                  <p>Data Surat</p>
                </a>
             
          <li class="nav-item">
                <a href="{{ route('admin.laporan') }}" class="nav-link ">
                  <i class="fas fa-file-signature nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="{{ route('admin.pengguna') }}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Kelola Pengguna</p>
                </a>
              </li>
             

              <!-- <li class="nav-item">
                <a href="info" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Info</p>
                </a>
              </li> -->

              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>