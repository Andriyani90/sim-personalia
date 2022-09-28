`<?php echo view("_partials/head"); ?>

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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/pelamar/index'); ?>">pelamar</a></li>
                        <li class="breadcrumb-item active">Update Data</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Data Pelamar PT Afour Erawijaya
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> Form Edit Data </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            $inputs = session()->getFlashdata('inputs');
                                            $errors = session()->getFlashdata('errors');
                                            if (!empty($errors)) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Whoops! Ada kesalahan saat input data, yaitu:
                                                    <ul>
                                                        <?php foreach ($errors as $error) : ?>
                                                            <li><?= esc($error) ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                            <div class="card">
                                                <?php echo form_open_multipart('pelamar/update/' . $pelamar['pelamar_id']); ?>
                                                <div class="card-body">
                                                    <?php echo form_hidden('pelamar_id', $pelamar['pelamar_id']); ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo form_label('Nama Lowongan', 'lowongan'); ?>
                                                                <?php echo form_dropdown('lowongan_id', $lowongan, $pelamar['lowongan_id'], ['class' => 'form-control']); ?>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Pendidikan Terakhir', 'pendidikan_terakhir');
                                                                echo form_dropdown('pendidikan_terakhir', [
                                                                    ''             => 'Pilih',
                                                                    'SMK'          => 'SMK',
                                                                    'SMA'          => 'SMA',
                                                                    'SARJANA'      => 'SARJANA',
                                                                    'MAGISTER'     => 'MAGISTER',
                                                                ], $pelamar['pendidikan_terakhir'], ['class' => 'form-control']);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php echo form_label('Nama Pelamar', 'nama'); ?>
                                                                <?php echo form_input(
                                                                    'nama',
                                                                    $pelamar['nama'],

                                                                    ['class' => 'form-control']

                                                                ); ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php echo form_label('Tanggal Lahir', 'tanggal_lahir'); ?>
                                                                <?php echo form_input(
                                                                    'tanggal_lahir',
                                                                    $pelamar['tanggal_lahir'],

                                                                    ['class' => 'form-control']

                                                                ); ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php echo form_label('Alamat', 'alamat'); ?>
                                                                <?php echo form_input(
                                                                    'alamat',
                                                                    $pelamar['alamat'],

                                                                    ['class' => 'form-control']

                                                                ); ?>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <?php 
                                                                    echo form_label('Agama');
                                                                    echo form_input('agama', $pelamar['agama'], ['class' => 'form-control ']);
                                                                ?>
                                                            </div><br>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo form_label('Pengalaman', 'pengalaman'); ?>
                                                                <?php echo form_input(
                                                                    'pengalaman',
                                                                    $pelamar['pengalaman'],

                                                                    ['class' => 'form-control']

                                                                ); ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="ijazah">Ijazah</label>
                                                                <input type="file" name="ijazah" id="ijazah"
                                                                    class="form-control">

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="ktp">Kartu Tanda Penduduk</label>
                                                                <input type="file" name="ktp" id="ktp"
                                                                    class="form-control">

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="kk">Kartu Keluarga</label>
                                                                <input type="file" name="kk" id="kk"
                                                                    class="form-control">
                                                            </div><br>

                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Status', 'status');
                                                                echo form_dropdown('status', [
                                                                    ''           => 'Pilih',
                                                                    'Daftar'     => 'Daftar',
                                                                    'Proses'     => 'Proses',
                                                                    'Terima'     => 'Terima',
                                                                    'Reject'     => 'Reject',
                                                                    'Tolak'      => 'Tolak',
                                                                ], $pelamar['status'], ['class' => 'form-control']);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php echo form_label('Deskripsi', 'deskripsi'); ?>
                                                                <?php echo form_input(
                                                                    'deskripsi',
                                                                    $pelamar['deskripsi'],

                                                                    ['class' => 'form-control']

                                                                ); ?>
                                                            </div><br>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?php echo base_url('pelamar/index'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Perbarui Data</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>

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