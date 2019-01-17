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
|	https://codeigniter.com/user_guide/general/routing.html
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

$route['admin_tasa']['GET']  = 'AdministrarTasa';
$route['admin_tasa']['POST'] = 'AdministrarTasa/agregar_tasa';

$route['editar_banco/(:num)']['GET'] = 'AdministrarBancos/editar_banco/$1';
$route['borrar_banco/(:num)']['GET'] = 'AdministrarBancos/borrar_banco/$1';

$route['editar_tasa/(:num)']['GET'] = 'AdministrarTasa/editar_tasa/$1';
$route['borrar_tasa/(:num)']['GET'] = 'AdministrarTasa/borrar_tasa/$1';

$route['admin_bancos']['GET'] = 'AdministrarBancos';
$route['admin_bancos']['POST'] = 'AdministrarBancos/agregar_banco';

$route['registrar_transaccion']['GET'] = 'RegistrarTransaccion';
$route['registrar_transaccion']['POST'] = 'RegistrarTransaccion/registrar_transaccion';

$route['transaccion']['GET'] = 'transaccion';

$route['default_controller'] = 'transaccion';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['consultar_tasa']['GET'] = 'AdministrarTasa/consultar_tasa';
$route['actualizar_listado_fechas']['GET'] = 'transaccion/entre_fechas';
