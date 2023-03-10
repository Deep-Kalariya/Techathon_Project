<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = "Login_Controller/index";
$route['logout'] = "Login_Controller/logout";
$route['dashboard'] = "Dashboard_Controller/index";

$route['visitors'] = "Visitor_Controller/index";
$route['visitors/list'] = "Visitor_Controller/visitors_list";
$route['visitors/add'] = "Visitor_Controller/add_visitor";
$route['visitor/edit/(:any)'] = "Visitor_Controller/edit_visitor/$1";
$route['visitor/delete'] = "Visitor_Controller/delete_visitor";

$route['flats'] = "Flat_Controller/index";
$route['flats/list'] = "Flat_Controller/flats_list";
$route['flats/add'] = "Flat_Controller/add_flat";
$route['flats/edit/(:any)'] = "Flat_Controller/edit_flat/$1";
$route['flats/delete'] = "Flat_Controller/delete_flat";

$route['users'] = "User_Controller/index";
$route['users/list'] = "User_Controller/users_list";
$route['user/add'] = "User_Controller/add_user";
$route['user/edit/(:any)'] = "User_Controller/edit_user/$1";
$route['user/delete'] = "User_Controller/delete_user";

$route['user-types'] = "Settings_Controller/index";
$route['user-types/list'] = "Settings_Controller/user_types_list";
$route['user-type/add'] = "Settings_Controller/add_user_type";