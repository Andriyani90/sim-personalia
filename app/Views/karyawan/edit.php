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
            <li class="breadcrumb-item"><a href="<?php echo base_url('/karyawan/index'); ?>">Karyawan</a></li>
            <li class="breadcrumb-item active">Update Data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              Data Karyawan PT Afour Erawijaya
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
                        <?php echo form_open_multipart('karyawan/update/' . $karyawan['karyawan_id']); ?>
                        <div class="card-body">
                          <?php echo form_hidden('karyawan_id', $karyawan['karyawan_id']); ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <?php echo form_label('Nama', 'nama'); ?>
                                <?php echo form_input(
                                  'nama',
                                  $karyawan['nama'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div> <br>
                              <div class="form-group">
                                <?php echo form_label('NIK', 'nik'); ?>
                                <?php echo form_input(
                                  'nik',
                                  $karyawan['nik'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div><br>
                              <div class="form-group">
                                <?php echo form_label('Telephone', 'telephone'); ?>
                                <?php echo form_input(
                                  'telephone',
                                  $karyawan['telephone'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div>
                              <div class="form-group">
                                <label for="ijazah">Ijazah</label>
                                <input type="file" name="ijazah" id="ijazah" class="form-control">

                              </div><br>
                              <div class="form-group">
                                <label for="ktp">Kartu Tanda Penduduk</label>
                                <input type="file" name="ktp" id="ktp" class="form-control">

                              </div><br>
                             
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <?php echo form_label('Alamat', 'alamat'); ?>
                                <?php echo form_input(
                                  'alamat',
                                  $karyawan['alamat'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div><br>
                              <div class="form-group">
                                <?php
                                  echo form_label('Tanggal Lahir', 'tanggal_lahir');
                                  echo form_input(
                                    'tanggal_lahir',
                                    $karyawan['tanggal_lahir'],
                                    ['class' => 'form-control']
                                  );
                                ?>
                              </div><br>
                              <div class="form-group">
                                <?php echo form_label('Tanggal Masuk', 'tanggal_masuk'); ?>
                                <?php echo form_input(
                                  'tanggal_masuk',
                                  $karyawan['tanggal_masuk'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div><br>
                              <div class="form-group">
                                <?php
                                echo form_label('Jabatan Karyawan', 'jabatan');
                                echo form_dropdown('jabatan', [

                                  ''                => 'Pilih',
                                  'Manager'         => 'Manager',
                                  'HRD'             => 'HRD',
                                  'Accounting'      => 'Accounting',
                                  'Operator'        => 'Operator',
                                  'Staff Operator'  => 'Staff Operator',

                                ], $karyawan['jabatan'], ['class' => 'form-control']);
                                ?>
                              </div><br>
                              <div class="form-group">
                                <?php
                                echo form_label('Status', 'status');
                                echo form_dropdown('status', [

                                  ''                => 'Pilih',
                                  'Kontrak'         => 'Kontrak',
                                  'Tetap'           => 'Tetap'

                                ], $karyawan['status'], ['class' => 'form-control']);
                                ?>
                              </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="perjanjian_kerja">Surat Perjanjian Kerja</label>
                                <input type="file" name="perjanjian_kerja" id="perjanjian_kerja" class="form-control">

                              </div><br>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="<?php echo base_url('karyawan/index'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Kembali</a>
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