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
                    <h1 class="mt-4">Data Lowongan PT Afour Erawijaya</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Lowongan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Data Lowongan PT Afour Erawijaya
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary text-left">List Data lowongan </h6>
                            <br>
                            <?php if(session()->get('level') == 2) {?>

                            <a href="<?php echo base_url('lowongan/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                                <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                            <a href="<?php echo base_url('lowongan/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>
                                <?php } ?>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama lowongan</th>
                                            <th class="text-center">Tanggal Input </th>
                                            <?php if(session()->get('level') == 2) {?>
                                            <th class="text-center">Actions</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lowongan as $key => $row) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key + 1; ?></td>
                                                <td class="text-center"><?php echo $row['nama_lowongan']; ?></td>
                                                <td class="text-center"><?php echo $row['tanggal_input']; ?></td>
                                                <?php if(session()->get('level') == 2) { ?>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('lowongan/edit/' . $row['lowongan_id']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('lowongan/delete/' . $row['lowongan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                            <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </main>
            <?php echo view('_partials/footer'); ?>

        </div>
    </div>
    <?php echo view('_partials/script'); ?>
</body>

</html>