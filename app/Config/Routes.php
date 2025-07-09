<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//inicio
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->post('auth', 'Login::auth');
$routes->get('logout', 'Login::logout');

//primer parte registro
$routes->get('register', 'Users::index');
$routes->post('register', 'Users::create');

//segunda parte activar
$routes->get('activate-user/(:any)', 'Users::activateUser/$1');

$routes->get('password-request', 'Users::linkRequestForm');
$routes->post('password-email', 'Users::SentResetLinkEmail');

//Inicio de sesion
$routes->get('home', 'Home::index');

//Controlador prestadores
$routes->group('/', ['filter' => 'auth'], function($routes){
$routes->get('prestador', 'PrestadorController::index');
$routes->get('prestador-list', 'PrestadorController::list');
$routes->get('prestador/add', 'PrestadorController::formadd');
$routes->get('prestador/edit/(:num)', 'PrestadorController::edit/$1');
$routes->get('prestador/delete/(:num)', 'PrestadorController::delete/$1');
$routes->post('agregar', 'PrestadorController::agregar');
$routes->post('actualizar', 'PrestadorController::actualizar');
$routes->get('prestador-del', 'PrestadorController::eliminar');
$routes->get('prestador-cons', 'PrestadorController::consultar');
//persona
$routes->get('persona', 'PersonaController::index');
$routes->get('persona-add', 'PersonaController::nuevo');
});

//Lenguas extranjeras 
$routes->get('lenguas', 'LexController::list');
$routes->get('lenguas', 'LexController::componente');

