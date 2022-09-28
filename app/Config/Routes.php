<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('login');
$routes->setDefaultMethod('/');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->get('/', 'Home::frontend');
$routes->get('/index', 'Home::index');
$routes->get('/login', 'LoginController::index');


// rounting data karyawan
$routes->get('karyawan/index', 'KaryawanController::index');
$routes->get('karyawan/create', 'KaryawanController::create');
$routes->post('karyawan/store', 'KaryawanController::store');
$routes->get('karyawan/edit/(:alphanum)', 'KaryawanController::edit/$1');
$routes->post('karyawan/update/(:num)', 'KaryawanController::update/$1');
$routes->get('karyawan/delete/(:alphanum)', 'KaryawanController::delete/$1');
$routes->get('karyawan/pdf', 'KaryawanController::pdf');

// routing pelamar
$routes->get('pelamar/index', 'PelamarController::index');
$routes->get('pelamar/create', 'PelamarController::create');
$routes->post('pelamar/store', 'PelamarController::store');
$routes->get('pelamar/edit/(:alphanum)', 'PelamarController::edit/$1');
$routes->get('pelamar/download/(:alphanum)', 'PelamarController::download/$1');
$routes->post('pelamar/update/(:num)', 'PelamarController::update/$1');
$routes->get('pelamar/delete/(:alphanum)', 'PelamarController::delete/$1');
$routes->get('pelamar/pdf', 'PelamarController::pdf');

# pendaftaran pada halaman depan aplikasi
$routes->get('index/pelamar/form', 'PelamarController::pelamar');
$routes->post('index/pelamar/store', 'PelamarController::register');

// routing talent
$routes->get('talent/pdf', 'TalentController::pdf');
$routes->get('talent/index', 'TalentController::index');
$routes->get('talent/create', 'TalentController::create');
$routes->post('talent/store', 'TalentController::store');
$routes->get('talent/edit/(:alphanum)', 'TalentController::edit/$1');
$routes->post('talent/update/(:num)', 'TalentController::update/$1');
$routes->get('talent/delete/(:alphanum)', 'TalentController::delete/$1');


// routing penilaian
$routes->get('penilaian/index', 'PenilaianController::index');
$routes->get('penilaian/create', 'PenilaianController::create');
$routes->post('penilaian/store', 'PenilaianController::store');
$routes->get('penilaian/edit/(:alphanum)', 'PenilaianController::edit/$1');
$routes->post('penilaian/update/(:num)', 'PenilaianController::update/$1');
$routes->get('penilaian/delete/(:alphanum)', 'PenilaianController::delete/$1');
$routes->get('penilaian/pdf', 'PenilaianController::pdf');


// routing lowongan
$routes->get('lowongan/index', 'LowonganController::index');
$routes->get('lowongan/create', 'LowonganController::create');
$routes->post('lowongan/store', 'LowonganController::store');
$routes->get('lowongan/edit/(:alphanum)', 'LowonganController::edit/$1');
$routes->post('lowongan/update/(:num)', 'LowonganController::update/$1');
$routes->get('lowongan/delete/(:alphanum)', 'LowonganController::delete/$1');
$routes->get('lowongan/pdf', 'LowonganController::pdf');


// Routing Penerimaan Data
$routes->get('penerimaan/index', 'PenerimaanController::index');
$routes->get('penerimaan/create', 'PenerimaanController::create');
$routes->post('penerimaan/store', 'PenerimaanController::store');
$routes->get('penerimaan/edit/(:alphanum)', 'PenerimaanController::edit/$1');
$routes->post('penerimaan/update/(:num)', 'PenerimaanController::update/$1');
$routes->get('penerimaan/delete/(:alphanum)', 'PenerimaanController::delete/$1');
$routes->get('penerimaan/pdf', 'PenerimaanController::pdf');



// routing training 
$routes->get('training/index', 'TrainingController::index');
$routes->get('training/create', 'TrainingController::create');
$routes->post('training/store', 'TrainingController::store');
$routes->get('training/edit/(:alphanum)', 'TrainingController::edit/$1');
$routes->post('training/update/(:num)', 'TrainingController::update/$1');
$routes->get('training/delete/(:alphanum)', 'TrainingController::delete/$1');
$routes->get('training/pdf', 'TrainingController::pdf');


// routing users
$routes->get('users/index', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
