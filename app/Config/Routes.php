<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('tasks', 'TasksController::index');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::loginProcess');
$routes->get('auth/signup', 'AuthController::signup');
$routes->post('auth/signup', 'AuthController::signupProcess');
$routes->get('auth/logout', 'AuthController::logout');
