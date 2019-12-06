<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'CompanyController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin Views
$route['admin/companies'] = 'CompanyController/admin';

//Routes for companies CRUD
$route['admin/companies/create'] = 'CompanyController/create';
$route['admin/companies/delete/(:any)'] = 'CompanyController/delete/$1';
$route['admin/companies/edit/(:any)'] = 'CompanyController/edit/$1';

//User routes
$route['companies/view/(:any)'] = 'CompanyController/view/$1';

//Auth routes
$route['login'] = 'AuthController/index';
$route['login/auth'] = 'AuthController/login';
$route['register'] = 'AuthController/register';
$route['register/save'] = 'AuthController/save';
$route['logout'] = 'AuthController/logout';