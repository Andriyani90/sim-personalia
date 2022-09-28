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
                    <h1 class="mt-4">Data Penerimaan Pelamar PT Afour Erawijaya</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('/penerimaan/index'); ?>">Penerimaan
                                Pelamar</a></li>
                        <li class="breadcrumb-item active">Tambah Baru</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Penambahan Data Penerimaan Pelamar Pada PT Afour Erawijaya Menyesuaikan dengan kebutuhan
                            industri
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-left"> Form Tambah Data Penerimaan Pelamar
                            </h6>
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
                                                <?php echo form_open_multipart('penerimaan/store'); ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group ">
                                                                <?php
                                                                echo form_label('Nama Pelamar', 'pelamar_id');
                                                                echo form_dropdown('pelamar_id', $pelamar, $inputs['pelamar_id'], ['class' => 'form-control']);
                                                                ?>
                                                            </div><br>

                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Tanggal Interview');
                                                                $tanggal_interview = [
                                                                    'type'  => 'date',
                                                                    'name'  => 'tanggal_interview',
                                                                    'id'    => 'tanggal_interview',
                                                                    'value' => $inputs['tanggal_interview'],
                                                                    'class' => 'form-control',
                                                                ];
                                                                echo form_input($tanggal_interview);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Start Kontrak');
                                                                $start_kontrak = [
                                                                    'type'  => 'date',
                                                                    'name'  => 'start_kontrak',
                                                                    'id'    => 'start_kontrak',
                                                                    'value' => $inputs['start_kontrak'],
                                                                    'class' => 'form-control',
                                                                ];
                                                                echo form_input($start_kontrak);
                                                                ?>
                                                            </div><br>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('End Kontrak');
                                                                $end_kontrak = [
                                                                    'type'  => 'date',
                                                                    'name'  => 'end_kontrak',
                                                                    'id'    => 'end_kontrak',
                                                                    'value' => $inputs['end_kontrak'],
                                                                    'class' => 'form-control',
                                                                ];
                                                                echo form_input($end_kontrak);
                                                                ?>
                                                            </div><br>
                                                            <div class="form-group">
                                                                <?php
                                                                echo form_label('Status', 'status');
                                                                echo form_dropdown(
                                                                    'status',
                                                                    [
                                                                        ''                => 'Pilih',
                                                                        'Proses'          => 'Proses',
                                                                        'Terima'          => 'Terima',
                                                                        'Reject'          => 'Reject',
                                                                        'Tolak'           => 'Tolak',

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
                                                        </div>
                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?php echo base_url('pelamar/index'); ?>"
                                                    class="btn btn-outline-info"> <i
                                                        class="nav-icon fas fa-backward"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary float-right"> <i
                                                        class="nav-icon fas fa-save"></i> Tambah Data</button>
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