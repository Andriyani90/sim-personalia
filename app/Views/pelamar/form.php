<?php echo view("_partials/head"); ?>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Form Lowongan Pekerjaan PT Afour Erawijaya</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> </h6>
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
                                                <?php echo form_open_multipart('index/pelamar/store'); ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <?php
                                                                echo form_label('Nama Lowongan', 'lowongan_id');
                                                                echo form_dropdown('lowongan_id', $lowongan, $inputs['lowongan_id'], ['class' => 'form-control']);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Pendidikan Terakhir', 'pendidikan_terakhir');
                                                                echo form_dropdown(
                                                                    'pendidikan_terakhir',
                                                                    [
                                                                        ''             => 'Pilih',
                                                                        'SMK'          => 'SMK',
                                                                        'SMA'          => 'SMA',
                                                                        'SARJANA'      => 'SARJANA',
                                                                        'MAGISTER'     => 'MAGISTER',

                                                                    ],
                                                                    $inputs['pendidikan_terakhir'],
                                                                    ['class' => 'form-control']
                                                                );
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pelamar</label>
                                                                <input type="text" name="nama" id="nama" class="form-control" required>

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="agama">Agama</label>
                                                                <input type="text" name="agama" id="agama" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" name="alamat" id="alamat" class="form-control" required>

                                                            </div>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Status', 'status');
                                                                echo form_dropdown(
                                                                    'status',
                                                                    [
                                                                        ''             => 'Pilih',
                                                                        'Daftar'       => 'Daftar'
                                                                    ],
                                                                    $inputs['status'],
                                                                    ['class' => 'form-control']
                                                                );
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Deskripsi');
                                                                $deskripsi = [
                                                                    'type'  => 'text',
                                                                    'name'  => 'deskripsi',
                                                                    'id'    => 'deskripsi',
                                                                    'value' => $inputs['deskripsi'],
                                                                    'class' => 'form-control',
                                                                ];
                                                                echo form_input($deskripsi);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="pengalaman">Pengalaman</label>
                                                                <input type="text" name="pengalaman" id="pengalaman" class="form-control" required>

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="ijazah">Ijazah</label>
                                                                <input type="file" name="ijazah" id="ijazah" class="form-control" required>

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="ktp">Kartu Tanda Penduduk</label>
                                                                <input type="file" name="ktp" id="ktp" class="form-control" required>

                                                            </div><br>
                                                            <div class="form-group">
                                                                <label for="kk">Kartu Keluarga</label>
                                                                <input type="file" name="kk" id="kk" class="form-control" required>
                                                            </div><br>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Simpan Lamaran</button>
                                        <a type="button" class="btn btn-secondary float-right" href="<?php echo base_url('/'); ?>"><i class="nav-icon fas fa-backward"></i> Kembali Ke Home</a>
                                        <?php echo form_close(); ?>
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