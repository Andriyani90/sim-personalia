<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo base_url("/index"); ?>">PT Afour Erawijaya</a>
            <!-- Sidebar Toggle-->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama_user'); ?> | <?php if (session()->get('level') == 1) {
                                                                                                                        echo 'Manager';
                                                                                                                    } elseif (session()->get('level') == 2) {
                                                                                                                        echo 'HRD';
                                                                                                                    } else {
                                                                                                                        echo 'Guest';
                                                                                                                    } ?></span>
                    <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url("/login") ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
</body>
</html>