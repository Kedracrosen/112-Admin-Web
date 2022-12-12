<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
$api_base = '/api/v1';
$user_api_base = '/api/v1/user';
$emr_api_base = '/api/v1/emr';
$dsh_base = '/console';

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
$routes->get('/', 'Home::index');

/**
 * Api Authentication route for Users
 */
$routes->post($user_api_base.'/auth/register', 'User::register', ['filter' => 'apifilter']);
$routes->post($user_api_base.'/auth/mobile', 'User::quick_register', ['filter' => 'apifilter']);
$routes->post($user_api_base.'/auth/otp_verify', 'User::otp_verify', ['filter' => 'apifilter']);
$routes->post($user_api_base.'/auth/logout/(:num)', 'User::logout/$1', ['filter' => 'apifilter']);
// we are not using password authentication for now
// $routes->post($user_api_base.'/auth/reset_password', 'User::reset_password', ['filter' => 'apifilter']);

//others
$routes->get($user_api_base.'/(:num)', 'User::get_user_data/$1', ['filter' => 'apifilter']);
$routes->put($user_api_base.'/update', 'User::update', ['filter' => 'apifilter']);
$routes->get($user_api_base.'/emergency_cetegories', 'User::fetch_emr_categories', ['filter' => 'apifilter']);

$routes->post($user_api_base.'/call_112', 'User::call_112', ['filter' => 'apifilter']);
$routes->post($user_api_base.'/end_call_112', 'User::end_call_112', ['filter' => 'apifilter']);

$routes->get($user_api_base.'/emergencies', 'User::emergencies', ['filter' => 'apifilter']);
$routes->get($user_api_base.'/emeregency/(:num)', 'User::emergency/$1', ['filter' => 'apifilter']);




// $routes->get($user_api_base,'/user/update', 'User::update_user', ['filter' => 'oauthfilter']);

/**
 * Api Authentication route for Responders
 */
$routes->post($emr_api_base.'/auth/login', 'Emr::login', ['filter' => 'apifilter']);
$routes->post($emr_api_base.'/auth/logout', 'Emr::logout', ['filter' => 'apifilter']);
$routes->post($emr_api_base.'/auth/request_password_reset', 'Emr::request_password_reset', ['filter' => 'apifilter']);
$routes->put($emr_api_base.'/auth/update_password', 'Emr::update_password', ['filter' => 'apifilter']);
$routes->get($emr_api_base.'/profile', 'Emr::fetch_profile', ['filter' => 'apifilter']);
$routes->get($emr_api_base.'/emergencies', 'Emr::emergencies', ['filter' => 'apifilter']);
$routes->post($emr_api_base.'/create_report', 'Emr::create_report', ['filter' => 'apifilter']);
$routes->get($emr_api_base.'/get_report', 'Emr::fetch_report', ['filter' => 'apifilter']);



//EMR endpoints accessible to only the admin
$routes->post($emr_api_base.'/auth/a-c/register', 'Emr::register', ['filter' => 'amdinfilter']);






/**
 * GENERAL ENDPOINTS -- endpoints perculiar to both the EMR and Users
 */

$routes->post('/api/v1/location/update', 'Tracker::log', ['filter' => 'apifilter']);
$routes->post('/api/v1/location/(:num)', 'Tracker::get/$1', ['filter' => 'apifilter']);









/**
 * Dashboard page route for admin
 */
$routes->get($dsh_base, 'Dashboard::index');
// $routes->get($dsh_base.'/console', 'Dashboard::index');
$routes->get($dsh_base.'/emergencies', 'Dashboard::emergencies', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/emergency/(:num)', 'Dashboard::emergency/$1', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/rescue_teams', 'Dashboard::rescue_teams', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/rescue_team/(:num)', 'Dashboard::rescue_team/$1', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/rescue_team/add_member', 'Dashboard::add_rescue_member', ['filter' => 'adminfilter']);
$routes->post($dsh_base.'/rescue_team/add_member', 'Dashboard::register_emr', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/rescue_team/add_team', 'Dashboard::add_rescue_team', ['filter' => 'adminfilter']);
$routes->post($dsh_base.'/rescue_team/add_team', 'Dashboard::register_team', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/users', 'Dashboard::list_users', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/user/(:num)', 'Dashboard::user_data/$1', ['filter' => 'adminfilter']);


$routes->get($dsh_base.'/chat', 'Dashboard::chat', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/log', 'Dashboard::activity_log', ['filter' => 'adminfilter']);
// $routes->get($dsh_base.'/profile', 'Dashboard::profile', ['filter' => 'adminfilter']);
$routes->get($dsh_base.'/profile', 'Dashboard::profile'); //for testing in postman delete before
$routes->get($dsh_base.'/location', 'Dashboard::location');
$routes->get($dsh_base.'/emr/locate/(:num)', 'Dashboard::emr_location/$1');





/**
 * Dashboard Authentication route for admin
 */
$routes->get($dsh_base.'/login', 'Dashboard::login');
$routes->get($dsh_base.'/logout', 'Dashboard::logout');
$routes->post($dsh_base.'/login', 'Dashboard::login');
$routes->get($dsh_base.'/register', 'Dashboard::register');
$routes->get($dsh_base.'/lock_screen', 'Dashboard::lock_screen');



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