<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login'); //ruta del login
$routes->post('/autenticar', 'Home::autenticar'); //
$routes->get('/cerrar', 'Home::salir'); //ruta para salir de la sesion
$routes->get('/Admin', 'Home::index'); //ruta principal para el administrador



$routes->get('/register', 'AuthController::register');

$routes->get('/login', 'AuthController::login');
$routes->post('/auth/validateUser', 'AuthController::validateUser');

$routes->post('/auth/createUser', 'AuthController::createUser');



$routes->get('/pdfs', 'PDFController::index'); // Ruta para listar los archivos
$routes->get('/pdfs/upload', 'PDFController::upload'); // Ruta para mostrar el formulario de subida
$routes->post('/pdfs/store', 'PDFController::store'); // Ruta para manejar el envío del formulario y subir el archivo
$routes->get('/pdfs/download/(:segment)', 'PDFController::download/$1'); // Ruta para descargar un archivo específico


/*$routes->get('/producto', 'Producto::index');
$routes->get('/producto/crear', 'Producto::mostrar');
$routes->post('/producto/traer', 'Producto::traer');
$routes->get('/producto/editar/(:num)/', 'Producto::editar/$1');
$routes->post('/producto/actualizar', 'Producto::actualizar');
$routes->get('/producto/borrar/(:num)', 'Producto::eliminar/$1');
*/