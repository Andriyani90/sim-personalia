<?php echo view("_partials/head"); ?>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="text-center"><b>SIP <b></h3> </br>
                                        <img src="logo.png" class="rounded  mx-auto d-block shadow-lg" alt="Cinque Terre " height='200px'><br>
                                        <p class="login-box-msg ">PT Afour Erawijaya</p>
                                        <hr>
                                        <?php
                                        if (!empty(session()->getFlashdata('sukses'))) { ?>
                                            <div class="alert alert-success">
                                                <?php echo session()->getFlashdata('sukses'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('haruslogin'))) { ?>
                                            <div class="alert alert-info">
                                                <?php echo session()->getFlashdata('haruslogin'); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                                            <div class="alert alert-warning">
                                                <?php echo session()->getFlashdata('gagal'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        echo form_open('LoginController/cek_login');
                                        ?>
                                    </div>
                                    <form class="user">
                                        <div class="input-group mb-3">
                                            <input type="text" name="username" class="form-control" placeholder=" Username " required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="row">
                                                <div class="col text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg" width="600px">Login</button>
                                                </div>
                                              </div>
                                    </form>
                                    <?php echo form_close(); ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php echo view('_partials/script'); ?>

</body>

</html>