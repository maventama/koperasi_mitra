<?php

namespace Config;

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
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index', ['as' => 'login']);
$routes->get('/password_reset', 'Auth::password_reset', ['as' => 'password_reset']);
$routes->post('/check_gmail', 'Auth::check_gmail', ['as' => 'check_gmail']);
$routes->get('/dashboard', 'Dashboard::index', ['as' => 'dashboard']);
$routes->get('/anggota', 'Anggota::index', ['as' => 'anggota']);
$routes->get('/detail_anggota/(:any)', 'Anggota::detail/$1');
// $routes->get('/form_anggota', 'Anggota::form');
// $routes->get('/form_anggota/(:any)', 'Anggota::form/$1');
// iuran 
$routes->get('/iuran', 'Iuran_wajib::index');
$routes->get('/iuran/(:any)', 'Iuran_wajib::detail/$1');
$routes->get('/iuran_wajibku', 'Iuran_wajib::riwayat_iuran_wajib');
// $routes->delete('/iuran/(:any)', 'Iuran_wajib::delete/$1');
$routes->get('detail_iuran/(:any)/(:any)', 'Iuran_wajib::detail_bulan/$1/$2');

$routes->get('/detail_peminjaman/(:any)', 'Peminjaman::detail/$1');
$routes->get('/detail_angsuran/(:any)', 'Peminjaman::detail_angsuran/$1');
$routes->get('/logout', 'Auth::logout');

$routes->get('/peminjamanku', 'Peminjaman::peminjamanku');
$routes->get('/pengaturan', 'Pengaturan::index', ['as' => 'pengaturan']);
$routes->get('/me', 'Me::index', ['as' => 'me']);
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
