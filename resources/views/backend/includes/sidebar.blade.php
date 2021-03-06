    <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('/images/appstore.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">MEDIATAMA CAT</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ ($active == 'home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ ($active == 'kategori-soal' || $active == 'mapel' || $active == 'submapel' || $active == 'soal') ? 'active' : '' }}" >
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Data Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('kategori-soal') }}" class="nav-link {{ ($active == 'kategori-soal') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Soal</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('mapel') }}" class="nav-link {{ ($active == 'mapel') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mata Pelajaran</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('submapel') }}" class="nav-link {{ ($active == 'submapel') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Mata Pelajaran</p>
                                    </a>
                                </li>
                            </ul> -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('soal') }}" class="nav-link {{ ($active == 'soal') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Soal</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ ($active == 'admin' || $active == 'user' || $active == '') ? 'active' : '' }}" >
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Data User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin') }}" class="nav-link {{ ($active == 'admin') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('user') }}" class="nav-link {{ ($active == 'user') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ ($active == 'token') ? 'active' : '' }}" >
                                <i class="nav-icon fa fa-tasks"></i>
                                <p>
                                    Management Ujian
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('token') }}" class="nav-link {{ ($active == 'token') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Token Ujian</p>
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
