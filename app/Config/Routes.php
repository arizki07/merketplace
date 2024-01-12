<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/register', 'AuthController::register');


$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/administrator', 'AdministratorController::index');
