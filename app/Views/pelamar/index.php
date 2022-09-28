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
                    <h1 class="mt-4">Data Pelamar PT Afour Erawijaya</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pelamar</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Data Pelamar PT Afour Erawijaya
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary text-left">List Data pelamar </h6>
                            <br>
                            <?php if(session()->get('level') == 2) { ?>

                            <a href="<?php echo base_url('pelamar/pdf'); ?>" target="_blank" class="btn btn-outline-danger float-left">
                                <i class="nav-icon fas fa-print"></i> &ensp;&ensp; PDF</a>
                            <a href="<?php echo base_url('pelamar/create'); ?>" class="btn btn-outline-success float-right"><i class="nav-icon fas fa-plus-square"></i> Tambah Data</a>
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
                                            <th class="text-center">Nama Pelamar</th>
                                            <th class="text-center">Alamat </th>
                                            <th class="text-center">Agama</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Pendidikan Terakhir</th>
                                            <th class="text-center">Pengalaman</th>
                                            <th class="text-center">Ijazah</th>
                                            <th class="text-center">Ktp</th>
                                            <th class="text-center">KK</th>
                                            <th class="text-center">Lowongan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Deskripsi</th>
                                            <?php if(session()->get('level') == 2) { ?>                                            
                                            <th class="text-center">Actions</th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pelamar as $key => $row) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $key + 1; ?></td>
                                                <td class="text-center"><?php echo $row['nama']; ?></td>
                                                <td class="text-center"><?php echo $row['alamat']; ?></td>
                                                <td class="text-center"><?php echo $row['agama']; ?></td>
                                                <td class="text-center"><?php echo $row['tanggal_lahir']; ?></td>
                                                <td class="text-center"><?php echo $row['pendidikan_terakhir']; ?></td>
                                                <td class="text-center"><?php echo $row['pengalaman']; ?></td>
                                                <td><a href="<?= base_url('uploads/ijazah/'.$row['ijazah']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['ijazah']; ?></a></td>
                                                <td><a href="<?= base_url('uploads/ktp/'.$row['ktp']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['ktp']; ?></a></td>
                                                <td><a href="<?= base_url('uploads/kk/'.$row['kk']) ?>" id="pseudo-dynamism" target="_blank"><?php echo $row['kk']; ?></a></td>
                                                <td class="text-center"><?php echo $row['nama_lowongan']; ?></td>
                                                <td class="text-center"><?php echo $row['status']; ?></td>
                                                <td class="text-center"><?php echo $row['deskripsi']; ?></td>
                                                <?php if(session()->get('level') == 2) { ?>

                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('pelamar/edit/' . $row['pelamar_id']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('pelamar/delete/' . $row['pelamar_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Data Pelamar ini?');">
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