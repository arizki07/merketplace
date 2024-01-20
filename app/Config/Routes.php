<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');

//Login
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('login/google-client/tURkWTpdyF68y85gV753fCcT7Kf37j', 'AuthController::loginGoogle');
$routes->get('google/callback', 'AuthController::googleCallback');
$routes->get('logout', 'AuthController::logout');

//register
$routes->get('register', 'RegisterController::register');
$routes->post('register', 'RegisterController::register');
$routes->get('verify-otp', 'RegisterController::verifyOTP');
$routes->post('verify-otp', 'RegisterController::verifyOTP');

//reset-password
$routes->get('forgot-password', 'ResetPasswordController::forgotPassword');
$routes->post('forgot-password', 'ResetPasswordController::processForgotPassword');
$routes->get('reset-password/(:any)', 'ResetPasswordController::showResetForm/$1', ['as' => 'password.reset']);
$routes->post('reset-password', 'ResetPasswordController::reset', ['as' => 'password.update']);


$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');

    //administrator
    $routes->get('administrator', 'AdministratorController::index');
    $routes->get('verify/(:num)', 'AdministratorController::verifyUser/$1', ['as' => 'admin.verify']);

    //data-user
    $routes->get('data-user', 'UserController::index');

    //Biodata
    $routes->get('penyedia-jasa', 'BiodataController::penyedia');
    $routes->get('add-penyedia', 'BiodataController::add');
    $routes->post('create-penyedia', 'BiodataController::create');
    $routes->get('penyedia-jasa/edit/(:segment)', 'BiodataController::edit/$1');
    $routes->post('penyedia-jasa/update/(:num)', 'BiodataController::update/$1');
    $routes->get('penyedia-jasa/delete/(:num)', 'BiodataController::delete/$1');

    //pengguna
    $routes->get('pengguna-jasa', 'BiodataController::pengguna');
    $routes->get('add-pengguna', 'BiodataController::add');
    $routes->post('create-pengguna', 'BiodataController::create');
    $routes->get('pengguna-jasa/edit/(:segment)', 'BiodataController::edit/$1');
    $routes->post('pengguna-jasa/update/(:num)', 'BiodataController::update/$1');
    $routes->get('pengguna-jasa/delete/(:num)', 'BiodataController::delete/$1');

    //List-Jasa
    $routes->get('list-jasa', 'ListJasaController::index');
    $routes->get('add-list-jasa', 'ListJasaController::add');
    $routes->post('store-list-jasa', 'ListJasaController::store');
    $routes->get('list-jasa/edit/(:segment)', 'ListJasaController::edit/$1');
    $routes->post('list-jasa/update/(:num)', 'ListJasaController::update/$1');
    $routes->get('list-jasa/delete/(:num)', 'ListJasaController::delete/$1');

    //Detail jasa
    $routes->get('detail', 'ListJasaController::detail');
});

$routes->group('penyedia', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');
});

$routes->group('pengguna', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::pengguna');
});
