<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Admin::index');
$routes->group('Admin', function ($routes) {
    $routes->add('proses', 'Admin::prosesLogin', ['as' => 'proses_admin']);
    $routes->add('logout', 'Admin::logout', ['as' => 'logout_admin']);
});
$routes->group('ahp', function ($routes) {
    $routes->group('user', function ($routes) {
        $routes->add('/', 'Ahp::user', ['as' => 'user_list']);
        $routes->post('tambah', 'Ahp::add_user', ['as' => 'add_user']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_user/$1');
        $routes->add('get/(:num)', 'Ahp::get_user/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_user/$1');
    });

    $routes->group('kriteria', function ($routes) {
        $routes->add('/', 'Ahp::kriteria', ['as' => 'kriteria_list']);
        $routes->post('tambah', 'Ahp::add_kriteria', ['as' => 'add_kriteria']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_kriteria/$1');
        $routes->add('get/(:num)', 'Ahp::get_kriteria/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_kriteria/$1');
    });

    $routes->group('jurusan', function ($routes) {
        $routes->add('/', 'Ahp::jurusan', ['as' => 'jurusan_list']);
        $routes->post('tambah', 'Ahp::add_jurusan', ['as' => 'add_jurusan']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_jurusan/$1');
        $routes->add('get/(:num)', 'Ahp::get_jurusan/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_jurusan/$1');
    });

    $routes->group('tanya', function ($routes) {
        $routes->add('/', 'Ahp::tanya', ['as' => 'tanya_list']);
        $routes->post('tambah', 'Ahp::add_tanya', ['as' => 'add_tanya']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_tanya/$1');
        $routes->add('get/(:num)', 'Ahp::get_tanya/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_tanya/$1');
    });

    $routes->group('jawab', function ($routes) {
        $routes->post('tambah/(:num)', 'Ahp::add_jawab/$1');
        $routes->add('hapus/(:num)', 'Ahp::hapus_jawab/$1');
        $routes->add('get/(:num)', 'Ahp::get_jawab/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_jawab/$1');
    });

    $routes->group('peserta', function ($routes) {
        $routes->add('/', 'Ahp::peserta', ['as' => 'peserta_list']);
        $routes->post('tambah', 'Ahp::add_peserta', ['as' => 'add_peserta']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_peserta/$1');
        $routes->add('get/(:num)', 'Ahp::get_peserta/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_peserta/$1');
        $routes->add('kuis', 'Ahp::kuis_peserta', ['as' => 'kuis']);
        $routes->add('kuis/(:num)', 'Ahp::kuis_peserta/$1');
    });

    $routes->group('sub', function ($routes) {
        $routes->add('/', 'Ahp::sub', ['as' => 'sub_list']);
        $routes->post('tambah', 'Ahp::add_sub', ['as' => 'add_sub']);
        $routes->add('hapus/(:num)', 'Ahp::hapus_sub/$1');
        $routes->add('get/(:num)', 'Ahp::get_sub/$1');
        $routes->add('edit/(:num)', 'Ahp::edit_sub/$1');
    });

    $routes->group('nilai', function ($routes) {
        $routes->add('siswa', 'Ahp::nilai', ['as' => 'nilai_siswa']);
        $routes->add('siswa/(:num)', 'Ahp::nilai_siswa/$1');
        $routes->add('siswa/update/(:num)/(:num)', 'Ahp::nilai_s_update/$1/$2');
        $routes->add('siswa/jurusan/(:num)/(:num)', 'Ahp::nilai_j_update/$1/$2');

        $routes->add('kriteria', 'Ahp::matrik_kriteria', ['as' => 'm_kriteria']);
        $routes->add('kriteria/update/(:num)/(:any)', 'Ahp::matrik_k_update/$1/$2');

        $routes->add('sub/(:num)', 'Ahp::matrik_sub/$1');
        $routes->add('sub/update/(:num)/(:any)', 'Ahp::matrik_s_update/$1/$2');

        $routes->add('un/(:num)', 'Ahp::matrik_j/$1');
        $routes->add('un/update/(:num)/(:any)', 'Ahp::matrik_j_update/$1/$2');
    });
});
/**
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