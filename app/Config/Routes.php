<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController::index');

//Login
$routes->get('login', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('login/google-client/tURkWTpdyF68y85gV753fCcT7Kf37j', 'AuthController::loginGoogle');
$routes->get('google/callback', 'AuthController::googleCallback');
$routes->get('logout', 'AuthController::logout');

// LOGIN LANDING
$routes->get('login-pengguna', 'AuthController::index');
$routes->post('login-pengguna', 'AuthController::login_pengguna');

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

// Shop
$routes->group('shop', function ($routes) {
    $routes->get('contact', 'ShopController::contact');
    $routes->get('cart', 'ShopController::cart');
    $routes->post('ulasan', 'UlasanController::ulasan');
    $routes->get('fotografi', 'ShopController::fotografi');
    $routes->get('videografi', 'ShopController::videografi');
    $routes->get('wo', 'ShopController::wo');
    // $routes->get('product-all', 'ShopController::all');

    // $routes->get('mybiodata', 'ShopController::biodata');
    $routes->match(['get', 'post'], 'payment/(:num)/(:any)/(:any)', 'PaymentGatewayController::index_pengguna/$1/$2/$3');
    $routes->match(['get', 'post'], 'payment/update-status/(:num)', 'PaymentGatewayController::payment_pengguna/$1');

    $routes->get('product/detail/(:num)', 'ShopController::detail/$1');
    // $routes->get('success', 'PaymentGatewayController::payment_success');
    $routes->get('payment/berhasil', 'PaymentGatewayController::payment_berhasil');
});



$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');

    //administrator
    $routes->get('administrator', 'AdministratorController::index');
    $routes->get('verify/(:num)', 'AdministratorController::verifyUser/$1', ['as' => 'admin.verify']);

    //data-user
    $routes->get('data-user', 'UserController::index');

    //Biodata
    $routes->get('penyedia-jasa', 'BiodataController::penyedia');
    $routes->get('add-penyedia', 'BiodataController::add_penyedia');
    $routes->post('create-penyedia', 'BiodataController::create_penyedia');
    $routes->get('penyedia-jasa/edit/(:segment)', 'BiodataController::edit_penyedia/$1');
    $routes->post('penyedia-jasa/update/(:num)', 'BiodataController::update_penyedia/$1');
    $routes->get('penyedia-jasa/delete/(:num)', 'BiodataController::delete_penyedia/$1');

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

    //pesanan
    $routes->get('pesanan', 'PesananController::index');
    $routes->get('pesanan/edit/(:num)', 'PesananController::edit/$1');
    $routes->post('pesanan/update/(:num)', 'PesananController::update/$1');
    $routes->get('pesanan/delete/(:num)', 'PesananController::delete/$1');

    //payment
    $routes->match(['get', 'post'], 'payment/(:num)/(:any)/(:any)', 'PaymentGatewayController::index/$1/$2/$3');
    $routes->match(['get', 'post'], 'payment/update-status/(:num)', 'PaymentGatewayController::updateStatus/$1');

    //transaksi
    $routes->get('transaksi', 'TransaksiController::index');
    $routes->get('transaksi/delete/(:num)', 'TransaksiController::delete/$1');

    //ulasan
    $routes->get('ulasan', 'UlasanController::index');
    // $routes->get('ulasan/edit/(:num)', 'UlasanController::edit/$1');
    // $routes->post('ulasan/update/(:num)', 'UlasanController::update/$1');
    $routes->get('ulasan/delete/(:num)', 'UlasanController::delete/$1');

    //GOOGLE & OTP
    $routes->get('google', 'AuthenticatedController::google');
    $routes->get('google/delete/(:num)', 'AuthenticatedController::deleteGoogle/$1');
    $routes->get('otp', 'AuthenticatedController::otp');
    $routes->get('otp/delete/(:num)', 'AuthenticatedController::deleteOtp/$1');
});

$routes->group('penyedia', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');

    // Profile
    $routes->get('profile', 'Penyedia\ProfileController::index');
    $routes->get('profile/create', 'Penyedia\ProfileController::create');
    $routes->post('profile/store', 'Penyedia\ProfileController::store');
    $routes->get('profile/edit/(:num)', 'Penyedia\ProfileController::edit/$1');
    $routes->post('profile/update/(:num)', 'Penyedia\ProfileController::update/$1');

    //productjasa
    $routes->get('list-jasa', 'ListJasaController::index');
    $routes->get('add-list-jasa', 'ListJasaController::add');
    $routes->post('store-list-jasa', 'ListJasaController::store');
    $routes->get('list-jasa/edit/(:segment)', 'ListJasaController::edit/$1');
    $routes->post('list-jasa/update/(:num)', 'ListJasaController::update/$1');
    $routes->get('list-jasa/delete/(:num)', 'ListJasaController::delete/$1');

    //Detail jasa
    $routes->get('detail', 'ListJasaController::detail');

    //pesanan
    $routes->get('pesanan', 'PesananController::index');
    $routes->get('pesanan/edit/(:num)', 'PesananController::edit/$1');
    $routes->post('pesanan/update/(:num)', 'PesananController::update/$1');
    $routes->get('pesanan/delete/(:num)', 'PesananController::delete/$1');

    //payment
    $routes->match(['get', 'post'], 'payment/(:num)/(:any)/(:any)', 'PaymentGatewayController::index/$1/$2/$3');
    $routes->match(['get', 'post'], 'payment/update-status/(:num)', 'PaymentGatewayController::updateStatus/$1');

    //transaksi
    $routes->get('transaksi', 'TransaksiController::index');
    $routes->get('transaksi/delete/(:num)', 'TransaksiController::delete/$1');

    //ulasan
    $routes->get('ulasan', 'UlasanController::index');
    $routes->get('ulasan/edit/(:num)', 'UlasanController::edit/$1');
    $routes->post('ulasan/update/(:num)', 'UlasanController::update/$1');
    $routes->get('ulasan/delete/(:num)', 'UlasanController::delete/$1');
});

$routes->group('pengguna', ['filter' => 'auth'], function ($routes) {

    $routes->get('dashboard', 'DashboardController::index');

    // Profile
    $routes->get('profile', 'Pengguna\ProfileController::index');
    $routes->get('profile/create', 'Pengguna\ProfileController::create');
    $routes->post('profile/store', 'Pengguna\ProfileController::store');
    $routes->get('profile/edit/(:num)', 'Pengguna\ProfileController::edit/$1');
    $routes->post('profile/update/(:num)', 'Pengguna\ProfileController::update/$1');
});
