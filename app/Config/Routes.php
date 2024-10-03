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

//$routes->get('/login', 'AuthController::login');
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

/*
$routes->get('/setencia', 'Producto::index');
$routes->get('/sentencias/crear', 'Setencia::mostrar');
$routes->post('/setencia/traer', 'Setencia::traer');
$routes->get('/setencia/editar/(:num)/', 'Setencia::editar/$1');
$routes->post('/setencia/actualizar', 'Setencia::actualizar');
$routes->get('/setencia/borrar/(:num)', 'Setencia::eliminar/$1');
*/

$routes->post('/auth/createSetencia', 'Setencia::createSetencia');



$routes->post('/sentencias/save', 'SentenciasController::save');
$routes->get('/sentencias/agregar', 'SentenciasController::agregar');

$routes->get('/sentencias/busqueda', 'SentenciasController::agregar');
$routes->post('sentencias/search', 'SentenciasController::search');

$routes->post('/login', 'AuthController::login');

$routes->get('/sentencias/editar/(:num)', 'SentenciasController::editar/$1');
$routes->post('sentencias/search', 'SentenciasController::search');

$routes->get('/sentencias', 'SentenciasController::index');
$routes->get('sentencias', 'SentenciasController::index');  // Página para listar y buscar sentencias

$routes->get('sentencias/agregar', 'SentenciasController::agregar');  // Formulario para agregar nueva sentencia
$routes->post('sentencias/save', 'SentenciasController::save');  // Acción para guardar una nueva sentencia

$routes->post('sentencias/search', 'SentenciasController::search');  // Acción para buscar sentencias


$routes->get('sentencias', 'SentenciasController::index');  // Página principal con búsqueda básica
$routes->post('sentencias/search', 'SentenciasController::search');  // Procesa la búsqueda básica

$routes->get('sentencias/advancedSearch', 'SentenciasController::advancedSearch');  // Página para la búsqueda avanzada
$routes->post('sentencias/advancedSearch', 'SentenciasController::advancedSearch');  // Procesa la búsqueda avanzada

$routes->get('/consultarentidad', 'EntidadController::consultarEntidad');
