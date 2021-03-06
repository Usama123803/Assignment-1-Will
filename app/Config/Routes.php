<?php

namespace Config;

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/header', '\Controllers\Home::hh');
//
$routes->get('/', '\Modules\Home\Controllers\Home::index');
#User Routes
$routes->get('/users', '\Modules\Users\Controllers\Users::index');
$routes->get('/user_register', '\Modules\Users\Controllers\Users::index');
$routes->post('/user_register', '\Modules\Users\Controllers\Users::index');
$routes->get('/user_login', '\Modules\Users\Controllers\Users::user_login');
$routes->post('/user_login', '\Modules\Users\Controllers\Users::user_login');
$routes->get('/user_forgot', '\Modules\Users\Controllers\Users::user_forgot');
$routes->post('/user_forgot', '\Modules\Users\Controllers\Users::user_forgot');
$routes->get('/user_dash', '\Modules\Users\Controllers\Dashboard::index');
$routes->post('/user_dash', '\Modules\Users\Controllers\Dashboard::index');
$routes->get('/user_profile', '\Modules\Users\Controllers\Users::user_profile');
$routes->post('/user_profile', '\Modules\Users\Controllers\Users::user_profile');
$routes->get('/test_email/(:any)', '\Modules\Users\Controllers\Users::test_email/$1');

#Activation Routes
$routes->get('activate/', '\Modules\Users\Controllers\Activation::activate/');
$routes->get('activate/(:any)', '\Modules\Users\Controllers\Activation::activate/$1');

#Logout Route
$routes->get('/logout', '\Modules\Logout::index');

#Vehicle Selection Routes
$routes->get('/add_vehicle', '\Modules\Vehicle\Controllers\Vehicle::add_vehicle');
$routes->post('/add_vehicle', '\Modules\Vehicle\Controllers\Vehicle::add_vehicle');
$routes->get('/edit_vehicle', '\Modules\Vehicle\Controllers\Vehicle::edit_vehicle');
$routes->get('/edit_vehicle/(:num)', '\Modules\Vehicle\Controllers\Vehicle::edit_vehicle/$1');
$routes->post('/edit_vehicle', '\Modules\Vehicle\Controllers\Vehicle::edit_vehicle');
$routes->post('/getmodels', '\Modules\Vehicle\Controllers\Vehicle::getmodels');
$routes->get('/getmodels', '\Modules\Vehicle\Controllers\Vehicle::getmodels');

#System Updates
##Vehicle
###Vehicle Make [updates all the information in the vehicle make table]
$routes->get('/updatemakes', '\Modules\System\Updates\Vehicle\Controllers\VehicleUpdate::updatemakes');
###Vehicle Model [updates all the information in the vehicle model table]
$routes->get('/updatemodels', '\Modules\System\Updates\Vehicle\Controllers\VehicleUpdate::updatemodels');
###Vehicle Years [updates all the years in the vehcileyears table]
$routes->get('/updateyears', '\Modules\System\Updates\Vehicle\Controllers\VehicleUpdate::updateyears');

##backend layout
$routes->get('/backend', '\Modules\Backend\Controllers\Backend::index');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
