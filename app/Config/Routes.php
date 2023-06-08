<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::form');
$routes->get('logout', 'Home::logout');

$routes->group('', ['filter' => 'authAdminMiddleware'], function ($routes) {

    $routes->get('/admin/users/search','Admin/UsersController::searchAdmin');
    $routes->get('/admin/users', 'UsersController::index');
    $routes->get('/admin/users/tambah', 'UsersController::new');
    $routes->post('/admin/users', 'UsersController::create');
    $routes->get('/admin/users/edit/(:num)', 'UsersController::edit/$1');
    $routes->post('/admin/users/edit/(:num)', 'UsersController::update/$1');
    $routes->delete('/admin/users/delete/(:num)',   'UsersController::delete/$1');


    $routes->get('/admin/peralatan', 'PeralatanHewanController::index');
    $routes->get('/admin/peralatan/tambah', 'PeralatanHewanController::new');
    $routes->post('/admin/peralatan', 'PeralatanHewanController::create');
    $routes->get('/admin/peralatan/edit/(:num)', 'PeralatanHewanController::edit/$1');
    $routes->post('/admin/peralatan/edit/(:num)', 'PeralatanHewanController::update/$1');
    $routes->delete('/admin/peralatan/delete/(:num)',   'PeralatanHewanController::delete/$1');

    $routes->get('/admin/makanan', 'MakananHewanController::index');
    $routes->get('/admin/makanan/tambah', 'MakananHewanController::new');
    $routes->post('/admin/makanan', 'MakananHewanController::create');
    $routes->get('/admin/makanan/edit/(:num)', 'MakananHewanController::edit/$1');
    $routes->post('/admin/makanan/edit/(:num)', 'MakananHewanController::update/$1');
    $routes->delete('/admin/makanan/delete/(:num)',   'MakananHewanController::delete/$1');

    $routes->get('/admin/jadwal-perawatan', 'Home::viewPerawatan');
});

$routes->group('', ['filter' => 'authUserMiddleware'], function ($routes) {
    $routes->get('/user/shop', 'UserRoleController::viewShop');
    $routes->get('/user/perawatan', 'UserRoleController::viewPerawatan');
    $routes->post('/user/req-perawatan', 'UserRoleController::reqPerawatan');

    $routes->get('/user/add_to_cart', 'UserRoleController::addToCart');
    $routes->get('/user/carts', 'UserRoleController::carts');
    $routes->post('/user/cart/update', 'UserRoleController::cartupdate');
    $routes->post('/user/cart/delete', 'UserRoleController::cartdelete');
    $routes->post('/user/order', 'UserRoleController::order');
    $routes->get('/user/checkout', 'UserRoleController::checkout');
    $routes->get('/user/history', 'UserRoleController::history');
});


// $routes->get('/admin/pemesanan-makanan', 'AuthController::login');
// $routes->get('/admin/perawatan', 'AuthController::login');

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
