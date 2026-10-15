<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/loginProcess', 'AuthController::loginProcess');
$routes->get('auth/signup', 'AuthController::signup');
$routes->post('auth/signupProcess', 'AuthController::signupProcess');
$routes->get('auth/logout', 'AuthController::logout');
$routes->get('auth/forgot-password', 'AuthController::forgotPassword');
$routes->post('auth/forgot-password-process', 'AuthController::forgotPasswordProcess');
$routes->get('auth/reset-password/(:segment)', 'AuthController::resetPassword/$1');
$routes->post('auth/reset-password-process', 'AuthController::resetPasswordProcess');

$routes->get('lang/(:segment)', 'LanguageController::switch/$1');

$routes->get('tasks', 'TasksController::index');
$routes->get('tasks/create', 'TasksController::create');
$routes->post('tasks/store', 'TasksController::store');
$routes->get('tasks/show/(:num)', 'TasksController::show/$1'); 
$routes->get('tasks/edit/(:num)', 'TasksController::edit/$1');
$routes->post('tasks/update/(:num)', 'TasksController::update/$1');
$routes->get('tasks/delete/(:num)', 'TasksController::delete/$1');



