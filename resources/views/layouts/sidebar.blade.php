<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ Request::is('dashboard/daftar*') || Request::is('dashboard/riwayat*') || Request::is('staff/daftar*') || Request::is('staff/pengaturan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Hibah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->roles[0]->name != 'staff')
                        @can('hibah-list')
                        <li class="nav-item">
                            <a href="{{ route('hibah.daftar.index') }}" class="nav-link {{ Request::is('dashboard/daftar*') ? 'active' : '' }}">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>Daftar Hibah</p>
                            </a>
                        </li>
                        @endcan
                        @can('riwayat_pengajuan_hibah-list')
                        <li class="nav-item">
                            <a href="{{ route('hibah.riwayat.index') }}" class="nav-link {{ Request::is('dashboard/riwayat*') ? 'active' : '' }}">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>Riwayat Pengajuan</p>
                            </a>
                        </li>
                        @endcan
                        @endif
                        @can('daftar_pengajuan_hibah-list')
                        <li class="nav-item">
                            <a href="{{ route('s_hibah.daftar.index') }}" class="nav-link {{ Request::is('staff/daftar*') ? 'active' : '' }}">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>Daftar Pengajuan</p>
                            </a>
                        </li>
                        @endcan
                        @can('pengaturan_hibah-list')
                        <li class="nav-item">
                            <a href="{{ route('s_hibah.pengaturan.index') }}" class="nav-link {{ Request::is('staff/pengaturan*') ? 'active' : '' }}">
                                <i class="fas fa-chevron-right nav-icon"></i>
                                <p>Pengaturan Hibah</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hibah.review.index') }}" class="nav-link {{ Request::is('*review*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Review</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
