        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url("/dashboard"); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clinic-medical"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Muhabbah <sup>HAIR</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('/dashboard'); ?>">
                    <i class="fas fa-clinic-medical"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php  if(session()->get('level') == 2) { ?>
            <div class="sidebar-heading">
                ADMIN WEB PANEL
            </div>
            <?php } ?>

            <?php if(session()->get('level') == 2 || session()->get('level') == 3) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/admin'); ?>">
                    <i class="fas fa-user" style="color:white;"></i>
                    <span>Data Admin</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('/perawatan'); ?>">
                    <i class="fas fa-user-nurse" style="color:white;"></i>
                    <span>Data Perawatan</span></a>
            </li>  
            <li class="nav-item" >
                <a class="nav-link" href="<?php echo base_url('/dokter'); ?>">
                    <i class="fas fa-user-md" style="color:white;"></i>
                    <span>Data Dokter</span></a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/obat'); ?>">
                    <i class="fas fa-prescription-bottle-alt" style="color:white;"></i>
                    <span>Data Obat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/users'); ?>">
                    <i class="fas fa-users" style="color:white;"></i>
                    <span>Data User</span></a>
            </li>
            <?php } ?>

          <?php  if(session()->get('level') == 1) { ?>
            <div class="sidebar-heading">
                DOKTER WEB PANEL
            </div>
            <?php } ?>
            <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/pasien'); ?>">
                    <i class="fas fa-procedures" style="color:white;"></i>
                    <span>Data Pasien</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/tindakan'); ?>">
                    <i class="fas fa-ambulance" style="color:white;"></i>
                    <span>Data Tindakan</span></a>
            </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
