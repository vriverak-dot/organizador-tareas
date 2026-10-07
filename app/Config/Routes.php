<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'TareasController::index');
$routes->get('tareas', 'TareasController::index');
