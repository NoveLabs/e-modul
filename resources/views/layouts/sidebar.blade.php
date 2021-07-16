<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" -->
           <!-- style="opacity: .8"> -->
      <span class="brand-text font-weight-light">E-Modul</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
        <a href="{{ route('logout') }}">Log Out</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{ route('guru.profile') }}" class="nav-link {{ request()->is('profile/guru') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profile Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('materi.index') }}" class="nav-link {{ request()->is('materi') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Materi
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
              Report Siswa
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
              <a href="{{ route('nilai.index') }}" class="nav-link {{ request()->is('nilai') == true ? 'active' : '' }}">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Lingkungan
              </p>
              </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('nilai.sosial.index') }}" class="nav-link {{ request()->is('nilai') == true ? 'active' : '' }}">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Sosial
              </p>
              </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('nilai.kesehatan.index') }}" class="nav-link {{ request()->is('nilai') == true ? 'active' : '' }}">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Kesehatan
              </p>
              </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
