<?php echo view("_partials/head"); ?>
    <body class="sb-nav-fixed">
        <?php echo view("_partials/topbar"); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <?php echo view("_partials/sidebar"); ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php if(session()->get('level') == 1 || session()->get('level') == 2) { ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Pelamar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span> <?php echo $total_pelamar ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Talent</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php echo $total_talent ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Penilaian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php  echo $total_penilaian?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Karyawan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php echo $total_karyawan ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Training</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php echo $total_training ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Lowongan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php echo $total_lowongan ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Data Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <p>Total Data: <span><?php  echo $total_users?></span></p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <?php }?>
                    </div>
                </main>
                <?php echo view('_partials/footer');?>

            </div>
        </div>
     <?php echo view('_partials/script');?>
    </body>
</html>
