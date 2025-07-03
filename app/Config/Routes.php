<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('register', 'AuthController::register');
$routes->post('handleRegister', 'AuthController::handleRegister');
$routes->get('login', 'AuthController::login');
$routes->post('handleLogin', 'AuthController::handleLogin');
$routes->get('logout', 'AuthController::logout');
$routes->get('admin/posts', 'PostController::manage');
$routes->get('admin/posts/create', 'PostController::create');
$routes->post('admin/posts/store', 'PostController::store');
$routes->get('admin/posts/edit/(:num)', 'PostController::edit/$1');
$routes->get('/', 'HomeController::index');
$routes->get('post/(:num)', 'HomeController::post/$1');
$routes->get('author/(:num)', 'HomeController::author/$1');
$routes->get('admin/posts/edit/(:num)', 'PostController::edit/$1');
$routes->post('admin/posts/update/(:num)', 'PostController::update/$1');  // ✅ this was missing
$routes->post('admin/posts/delete/(:num)', 'PostController::delete/$1');