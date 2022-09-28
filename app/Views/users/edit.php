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
          <h1 class="mt-4">Data User PT Afour Erawijaya</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo base_url('/index'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('/users/index'); ?>">Users</a></li>
            <li class="breadcrumb-item active">Update Data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              Data User PT Afour Erawijaya
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
                        <?php echo form_open_multipart('users/update/' . $users['id']); ?>
                        <div class="card-body">
                          <?php echo form_hidden('id', $users['id']); ?>
                          <div class="row">
                            <div class="col-md-6">

                              <div class="form-group">
                                <?php echo form_label('Nama User', 'nama_user'); ?>
                                <?php echo form_input(
                                  'nama_user',
                                  $users['nama_user'],

                                  ['class' => 'form-control']

                                ); ?>
                              </div>
                              <div class="form-group">
                                <?php echo form_label('Username', 'username'); ?>
                                <?php echo form_input(
                                  'username',
                                  $users['username'],

                                  ['class' => 'form-control']
                                );

                                ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <?php echo form_label('Password', 'password'); ?>
                                <?php echo form_input(
                                  'password',
                                  $users['password'],

                                  ['class' => 'form-control']
                                );

                                ?>
                              </div>

                              <div class="form-group">
                                <?php echo form_label('Level', 'level'); ?>
                                <?php echo form_input(
                                  'level',
                                  $users['level'],

                                  ['class' => 'form-control']
                                );

                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="<?php echo base_url('users/index'); ?>" class="btn btn-outline-info"> <i class="nav-icon fas fa-backward"></i> Kembali</a>
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