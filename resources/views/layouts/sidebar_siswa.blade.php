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
            <a href="{{ route('siswa.profile') }}" class="nav-link {{ request()->is('siswa/guru') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profile Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tujuan.pembelajaran') }}" class="nav-link {{ request()->is('tujuan') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tujuan Pembelajaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('teks.eksplanasi') }}" class="nav-link {{ request()->is('eksplanasi') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Materi Teks Eksplanasi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('materi_siswa.index') }}" class="nav-link {{ request()->is('materi/siswa') == true ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Kegiatan Siswa
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
