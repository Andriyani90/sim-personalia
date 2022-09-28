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
                    <h1 class="mt-4">Data Karyawan PT Afour Erawijaya</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Karyawan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                           Data karyawan PT Afour Erawijaya
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary text-left">List Data karyawan </h6>
                            <br>
                            <?php if(session()->get('level') == 2) { ?>
                            <a href="<?php echo base_url('karyawan/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                                <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                            <a href="<?php echo base_url('karyawan/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>
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
                                            <th class="text-center">Nama karyawan</th>
                                            <th class="text-center">NIK </th>
                                            <th class="text-center">Telephone </th>
                                            <th class="text-center">alamat </th>
                                            <th class="text-center">Ijazah </th>
                                            <th class="text-center">Ktp </th>
                                            <th class="text-center">Surat Perjanjian </th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Tanggal Masuk </th>
                                            <th class="text-center">Jabatan </th>
                                            <th class="text-center">Status</th>
                                            <?php if(session()->get('level') == 2) {?>
                                            <th class="text-center">Actions</th>
                                            <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($karyawan as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['nik']; ?></td>
                                                <td><?php echo $row['telephone']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><a href="<?= base_url('uploads/ijazah/'.$row['ijazah']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['ijazah']; ?></a></td>
                                                <td><a href="<?= base_url('uploads/ktp/'.$row['ktp']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['ktp']; ?></a></td>
                                                <td><a href="<?= base_url('uploads/perjanjiankerja/'.$row['perjanjian_kerja']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['perjanjian_kerja']; ?></a></td>
                                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                                <td><?php echo $row['tanggal_masuk']; ?></td>
                                                <td><?php echo $row['jabatan']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                                                            <?php if(session()->get('level') == 2) {?>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('karyawan/edit/' . $row['karyawan_id']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('karyawan/delete/' . $row['karyawan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                            <?php } ?>
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