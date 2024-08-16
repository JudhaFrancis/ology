<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setAutoRoute(true);
$routes->setDefaultNamespace('Core\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
// $routes->set404Override('Core\Controllers\UsersController::show404');
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
$routes->get('home', 'Home::index');
$routes->get('common-login', 'Home::common_login');
$routes->get('login', 'Home::login_view');
$routes->get('logout', 'Home::logout');
$routes->get('success', 'Home::success');
$routes->get('admindashboard', 'Home::admin_dashboard');
$routes->get('admin-login', 'Home::admin_login');
$routes->get('about', 'Home::about');
$routes->get('workshop', 'Home::workshop');
$routes->get('contact', 'Home::contact');
$routes->get('members', 'Home::members');
$routes->get('admin-dashboard', 'Home::admin_ashboard');
$routes->get('admin-login', 'Home::admin_login');
$routes->get('calendar', 'Home::calendar');
$routes->get('career', 'Home::career');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('girlskeepusgoing', 'Home::girlskeepusgoing');
$routes->get('notice-board', 'Home::notice_board');
$routes->get('ourstory', 'Home::ourstory');
$routes->get('payment', 'Home::payment');
$routes->get('signin', 'Home::signin');
$routes->get('signup', 'Home::signup');
$routes->get('terms_condition', 'Home::terms_condition');
$routes->get('user-dashboard', 'Home::user_dashboard');
$routes->get('galleries', 'Gallery\GalleryController::galleries');
$routes->get('gallery/(:any)', 'Gallery\GalleryController::gallery/$1');
$routes->get('event', 'Event\EventController::event');
$routes->get('event_details/(:any)', 'Event\EventController::event_details/$1');
$routes->get('blog', 'Blog\BlogController::blog');
$routes->get('blog_details/(:any)', 'Blog\BlogController::blog_details/$1');

$routes->group('api/v1', ["namespace" => "Core\Controllers"], function ($routes) {
    $routes->get('search/(:any)/(:any)', 'Utility::search/$1/$2');
    $routes->post('uploadFile', 'Utility::uploadTempFile');
    $routes->get('exportExcel', 'Utility::exportExcel');
    $routes->add('get/(:any)', 'Utility::getData/false/$1');
    $routes->get('genModule/(:any)/(:any)', 'Utility::genModule/$1/$2');
    $routes->get('getAppVersion', 'Utility::getAppVersion');
    $routes->get('getCountryPhone', 'Utility::getCountryPhone');
    $routes->add('genEmail/(:any)', 'EmailController::generateEmail/$1');
    $routes->add('genEmail', 'EmailController::generateEmail');
    $routes->add('preview_pdf/(:any)', 'EmailController::preview_pdf/$1');
    $routes->post('preview_pdf', 'EmailController::preview_pdf');
    $routes->add('getfull/(:any)', 'Utility::getData/true/$1');
    $routes->add('saveData/(:any)', 'Utility::saveData/$1');
    $routes->add('getById/(:any)/(:any)', 'Utility::getById/$1/$2');
    $routes->add('importData', 'Utility::importData');
    $routes->add('getAllPermission/(:any)', 'Utility::getAllPermission/$1');
    $routes->post('exportData/(:any)', 'Utility::exportData/$1');
    $routes->get('sendOTP/(:any)/(:any)', 'Utility::sendOTP/$1/$2');
    $routes->get('resendOTP/(:any)/(:any)', 'Utility::resendOTP/$1/$2');
    
});
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
//$appName = ucfirst(strtolower(BASEAPP));
// if (is_file(MODULE_PATH . $appName . '/Config/' . 'Routes.php')) {
//     require MODULE_PATH . $appName . '/Config/' . 'Routes.php';
// }
