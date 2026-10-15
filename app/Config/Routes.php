<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/loginProcess', 'AuthController::loginProcess');
$routes->get('auth/signup', 'AuthController::signup');
$routes->post('auth/signupProcess', 'AuthController::signupProcess');
$routes->get('auth/logout', 'AuthController::logout');

$routes->get('lang/(:segment)', 'LanguageController::switch/$1');

$routes->get('tasks', 'TasksController::index');
$routes->get('tasks/create', 'TasksController::create');
$routes->get('tasks/Store', 'TasksController::Store');
$routes->get('tasks/edit/(:num)', 'TasksController::edit/$1');
$routes->get('tasks/update/(:num)', 'TasksController::update/$1');
$routes->get('tasks/delete/(:num)', 'TasksController::delete/$1');

