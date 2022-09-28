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
                    <h1 class="mt-4">Data Penilaian PT Afour Erawijaya</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/penilaian/index'); ?>">Penilaian</a></li>
                        <li class="breadcrumb-item active">Tambah Baru</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Penambahan Data Penilaian Pada PT Afour Erawijaya Menyesuaikan dengan kebutuhan industri
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> Form Tambah Data penilaian </h6>
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
                                                <?php echo form_open_multipart('penilaian/store'); ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group ">
                                                                <?php
                                                                echo form_label('Nama Karyawan', 'karyawan_id');
                                                                echo form_dropdown('karyawan_id', $karyawan, $inputs['karyawan_id'], ['class' => 'form-control']);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Penilain Atas', 'penilaian_atas');
                                                                echo form_dropdown(
                                                                    'penilaian_atas',
                                                                    [
                                                                        ''                          => 'Pilih',
                                                                        'Pencapaian Target'         => 'Pencapaian Target',
                                                                        'Performance Pekerjaan'     => 'Performance Pekerjaan',
                                                                        'Lain Lain'                 => 'Lain Lain',
                                                                    ],
                                                                    $inputs['penilaian_atas'],
                                                                    ['class' => 'form-control']
                                                                );
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Nilai');
                                                                $nilai = [
                                                                    'type'  => 'text',
                                                                    'name'  => 'nilai',
                                                                    'id'    => 'nilai',
                                                                    'value' => $inputs['nilai'],
                                                                    'class' => 'form-control',
                                                                    'placeholder' => 'Masukan Nilai'
                                                                ];
                                                                echo form_input($nilai);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Periode');
                                                                $periode = [
                                                                    'type'  => 'date',
                                                                    'name'  => 'periode',
                                                                    'id'    => 'periode',
                                                                    'value' => $inputs['periode'],
                                                                    'class' => 'form-control',
                                                                ];
                                                                echo form_input($periode);
                                                                ?>
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?php echo base_url('penilaian/index'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary float-right"> <i class="nav-icon fas fa-save"></i> Tambah Data</button>
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