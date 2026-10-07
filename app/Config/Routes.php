<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'TareasController::index');
$routes->get('tareas', 'TareasController::index');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginProcess');
$routes->get('signup', 'AuthController::signup');
$routes->post('signup', 'AuthController::signupProcess');
$routes->get('logout', 'AuthController::logout');
