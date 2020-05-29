<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['activation/(:any)'] = "users/activation/$1";
$route['users/forgot'] = "users/forgot_password";
$route['verify/(:any)'] = "login_register/view_verify/$1";
$route['events/update'] = 'events/update';
$route['events/create'] = 'events/create';
$route['events/(:any)'] = 'events/view/$1';
$route['events'] = 'events/index';
$route['events/public'] = 'events/publicindex';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
