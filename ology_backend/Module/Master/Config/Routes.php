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
	$routes->group('member', function ($routes) {
		$routes->post('memberSave', 'Member\Member_requestController::memberSave');
		$routes->get('getmemberReqList/(:any)', 'Member\Member_requestController::getList/$1');
		$routes->get('search/(:any)', 'Member\MemberController::search/$1/$2');
		$routes->get('getList/(:any)', 'Member\MemberController::getList/$1');
		$routes->get('getById/(:any)', 'Member\MemberController::get/$1');
		$routes->post('memberApprove', 'Member\MemberController::memberApprove');
		$routes->get('getAllMember', 'Member\MemberController::getAllMember');
		$routes->get('getMemberAddressById/(:any)', 'Member\MemberController::getMemberAddressById/$1');
		$routes->post('updateMemberName', 'Member\MemberController::updateMemberName');
	});
$routes->group('member_request', function ($routes) {
		$routes->get('getList/(:any)', 'Member\Member_requestController::getList/$1');
	});
	$routes->group('dashboard', function ($routes) {
		$routes->get('getData', 'Dashboard\DashboardController::getData');
	});
	$routes->group('report', function ($routes) {
		$routes->post('getReport/(:any)', 'ReportController::genReport/$1');
	});
});
