<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');

//Login
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

//Registrasi
$routes->get('/register', 'AuthController::register');
$routes->post('register', 'AuthController::register');



$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');

    //administrator
    $routes->get('administrator', 'AdministratorController::index');
    $routes->get('verify/(:num)', 'AdministratorController::verifyUser/$1', ['as' => 'admin.verify']);

    //data-user
    $routes->get('data-user', 'UserController::index');

    //Biodata
    $routes->get('penyedia-jasa', 'BiodataController::penyedia');

    //pengguna
    $routes->get('pengguna-jasa', 'BiodataController::pengguna');
    $routes->get('add-pengguna', 'BiodataController::add');
});

$routes->group('penyedia', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');
});

$routes->group('pengguna', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');
});
