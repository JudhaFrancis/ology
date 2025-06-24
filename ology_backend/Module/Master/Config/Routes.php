<?php

// namespace Config;

// Create a new instance of our RouteCollection class.
// $routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
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
$routes->group('api/v1', ["namespace" => "App\Controllers"], function ($routes) {
	$routes->group('newsletter', function ($routes) {
		$routes->post('newssend', 'Subscribe\NewsletterController::newssend');
		$routes->get('unsubscribe/(:any)', 'Subscribe\NewsletterController::unsubscribe/$1');
	});
});
