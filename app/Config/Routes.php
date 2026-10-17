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

$routes->get('profile', 'ProfileController::show');
$routes->get('profile', 'ProfileController::index');
$routes->get('profile/edit', 'ProfileController::authenticate');
$routes->post('profile/verify', 'ProfileController::verifyPassword'); 
$routes->get('profile/edit-form', 'ProfileController::editForm'); 
$routes->post('profile/update', 'ProfileController::update');
$routes->get('profile/change-password', 'ProfileController::changePasswordForm');
$routes->post('profile/update-password', 'ProfileController::updatePassword');
$routes->get('profile/change-image', 'ProfileController::changeImageForm');
$routes->post('profile/upload-image', 'ProfileController::uploadImage');
$routes->get('profile/delete-image', 'ProfileController::deleteImageConfirm');
$routes->post('profile/delete-image-process', 'ProfileController::deleteImage');

$routes->get('users', 'UsersController::index');
$routes->get('users/(:num)', 'UsersController::show/$1');
$routes->get('users/show/(:num)', 'UsersController::show/$1');




