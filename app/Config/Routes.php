<?php

use CodeIgniter\Router\RouteCollection;

// AUTH
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

// DASHBOARD (WAJIB LOGIN)
$routes->get('/', 'Dashboard::index');


// PUBLIC (LIHAT DATA)
$routes->get('siswa', 'Siswa::index');

// ADMIN CRUD
$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'Siswa::create');
    $routes->post('store', 'Siswa::store');
    $routes->get('edit/(:num)', 'Siswa::edit/$1');
    $routes->post('update/(:num)', 'Siswa::update/$1');
    $routes->get('delete/(:num)', 'Siswa::delete/$1');
});

// PUBLIC
$routes->get('kelompok', 'Kelompok::index');

// ADMIN CRUD
$routes->group('kelompok', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'Kelompok::create');
    $routes->post('store', 'Kelompok::store');
    $routes->get('edit/(:num)', 'Kelompok::edit/$1');
    $routes->post('update/(:num)', 'Kelompok::update/$1');
    $routes->get('delete/(:num)', 'Kelompok::delete/$1');
});

// PUBLIC
$routes->get('pembimbingsekolah', 'PembimbingSekolah::index');

// ADMIN CRUD
$routes->group('pembimbingsekolah', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'PembimbingSekolah::create');
    $routes->post('store', 'PembimbingSekolah::store');
    $routes->get('edit/(:num)', 'PembimbingSekolah::edit/$1');
    $routes->post('update/(:num)', 'PembimbingSekolah::update/$1');
    $routes->get('delete/(:num)', 'PembimbingSekolah::delete/$1');
});

// PUBLIC
$routes->get('pembimbinguniv', 'PembimbingUniv::index');

// ADMIN CRUD
$routes->group('pembimbinguniv', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'PembimbingUniv::create');
    $routes->post('store', 'PembimbingUniv::store');
    $routes->get('edit/(:num)', 'PembimbingUniv::edit/$1');
    $routes->post('update/(:num)', 'PembimbingUniv::update/$1');
    $routes->get('delete/(:num)', 'PembimbingUniv::delete/$1');
});


// PUBLIC
$routes->get('penilaian', 'Penilaian::index');

// ADMIN CRUD
$routes->group('penilaian', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'Penilaian::create');
    $routes->post('store', 'Penilaian::store');
    $routes->get('edit/(:num)', 'Penilaian::edit/$1');
    $routes->post('update/(:num)', 'Penilaian::update/$1');
    $routes->get('delete/(:num)', 'Penilaian::delete/$1');
});
