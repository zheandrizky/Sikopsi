<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard')?>" class="brand-link">
        <img src="<?php echo base_url('assets/admin/dist'); ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php $segment = $this->uri->segment(1); ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Menu -->
                <li class="nav-item <?php echo ($segment == 'dashboard' || $segment == '') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo ($segment == 'dashboard' || $segment == '') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('dashboard'); ?>" class="nav-link <?php echo ($segment == 'dashboard' || $segment == '') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Services Menu -->
                <li class="nav-item <?php echo ($segment == 'saham' || $segment == 'tabungan' || $segment == 'pinjam') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo ($segment == 'saham' || $segment == 'tabungan' || $segment == 'pinjam') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Services
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('saham'); ?>" class="nav-link <?php echo ($segment == 'saham') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Saham</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('tabungan'); ?>" class="nav-link <?php echo ($segment == 'tabungan') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabungan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('pinjam'); ?>" class="nav-link <?php echo ($segment == 'pinjam') ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pinjam&Pengembalian</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
