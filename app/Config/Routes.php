<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();


$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);



$routes->get('instrucciones', 'Usuario\FrontendController::instrucciones');
$routes->get('acercade', 'Usuario\FrontendController::acercade');
$routes->get('contacto', 'Usuario\FrontendController::contacto');
// $routes->get('login', 'UserController::login');


$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');
    // $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->resource('asignaturas', ['controller' => 'Admin\AsignaturaController']);
});

$routes->group('docente', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
});

$routes->group('estudiante', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Estudiante\EstudianteController::index');
});

$routes->get('logout', 'UserController::logout');


// Ruta de prueba
$routes->get('login2', 'UserController::login2');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
