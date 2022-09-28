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
          <h1 class="mt-4">Data Users PT Afour Erawijaya</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('/users/index'); ?>">Users</a></li>
            <li class="breadcrumb-item active">Tambah Baru</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              Penambahan Data Users Pada PT Afour Erawijaya Menyesuaikan dengan kebutuhan industri
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary text-left"> Form Tambah Data Users </h6>
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
                      <?php echo form_open_multipart('users/store'); ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <?php
                                echo form_label('Nama User');
                                $nama_user = [
                                  'type'  => 'text',
                                  'name'  => 'nama_user',
                                  'id'    => 'nama_user',
                                  'value' => $inputs['nama_user'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Nama User'
                                ];
                                echo form_input($nama_user);
                                ?>
                              </div>

                              <div class="form-group">
                                <?php
                                echo form_label('Username');
                                $username = [
                                  'type'  => 'text',
                                  'name'  => 'username',
                                  'id'    => 'username',
                                  'value' => $inputs['username'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Username'
                                ];
                                echo form_input($username);
                                ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <?php
                                echo form_label('Masukan Password');
                                $password = [
                                  'type'  => 'password',
                                  'name'  => 'password',
                                  'id'    => 'password',
                                  'value' => $inputs['password'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Masukan Password'
                                ];
                                echo form_input($password);
                                ?>
                              </div>
                              <div class="form-group">
                                <?php
                                echo form_label('Level Hak Akses');
                                $hak_akses = [
                                  'type'  => 'number',
                                  'name'  => 'level',
                                  'id'    => 'level',
                                  'value' => $inputs['level'],
                                  'class' => 'form-control',
                                  'placeholder' => 'Hak Akses'
                                ];
                                echo form_input($hak_akses);
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-info float-left"> <i class="nav-icon fas fa-backward"> Kembali</i></a>
                        <button type="submit" class="btn btn-primary float-right"><i class="nav-icon fas fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
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