<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="<?php echo base_url("/index") ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Data Karyawan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url("karyawan/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Karyawan
                        </a>
                        <a class="nav-link" href="<?php echo base_url("training/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Training
                        </a>
                        <a class="nav-link" href="<?php echo base_url("penilaian/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Penilaian
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Data Rekapitulasi
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#collapsePages">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url("pelamar/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data List Pelamar
                        </a>
                        <a class="nav-link" href="<?php echo base_url("lowongan/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Lowongan
                        </a>
                        <a class="nav-link" href="<?php echo base_url("penerimaan/index") ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Penerimaan
                        </a>
                    </nav>
                </div>

                <?php } ?>
            </div>
        </div>
    </nav>
</div>