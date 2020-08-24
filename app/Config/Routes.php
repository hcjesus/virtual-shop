<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
$routes->get('/home', 'HomeController::index');
$routes->get('/registro', 'RegistroController::registro');
$routes->match(['get', 'post'], '/insert', 'RegistroController::insert');
$routes->match(['get', 'post'], '/valida', 'LoginController::valida');
$routes->match(['get', 'post'], '/saveItem', 'ItemsController::saveItem');
$routes->match(['get', 'post'], '/updateItem', 'ItemsController::updateItem');
$routes->match(['get', 'post'], '/saveBrand', 'BrandController::saveBrand');
$routes->match(['get', 'post'], '/saveCategory', 'CategoryController::saveCategory');
$routes->match(['get', 'post'], '/buscarItem', 'ItemsController::buscarItem');

$routes->get('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/newItem', 'ItemsController::newItem');
$routes->get('/newBrand', 'BrandController::newBrand');
$routes->get('/newCategory', 'CategoryController::newCategory');

$routes->get('/items', 'ItemsController::showItems');
$routes->get('/itemsCarrousel', 'ItemsController::itemsCarrousel');
$routes->add('showItemCategory/(:num)', 'ItemsController::showItemCategory/$1',['as'=>'showItemCategory']);
$routes->add('updateCarrousel', 'ItemsController::updateCarrousel');
$routes->add('profile','UsersController::profile');

$routes->add('editItem/(:num)', 'ItemsController::editItem/$1',['as'=>'editar']);

$routes->add('deleteItem/(:num)', 'ItemsController::deleteItem/$1',['as'=>'eliminar']);

$routes->add('detalleItem/(:num)', 'ItemsController::detalleItem/$1',['as'=>'detalle']);

$routes->add('addToCart/(:num)', 'CartController::addToCart/$1',['as'=>'add']);

$routes->add('addToCart2','CartController::addToCart2',['as'=>'addToCart2']);

$routes->add('cartPage','CartController::cartPage');
$routes->add('updateCart','CartController::updateCart');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
