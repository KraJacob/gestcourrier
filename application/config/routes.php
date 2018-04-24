<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['users'] = 'Controlleruser/affichageUser';
$route['type_passager'] = 'ControllerPassager/load_type_passager';
$route['type_personnel'] = 'ControllerPersonnel/load_type_personnel';
$route['gare'] = 'ControllerPersonnel/load_gare';
$route['type_colis'] = 'ControllerColis/load_type_colis';
$route['add_vehicule'] = 'ControllerVehicule/load_vehicule';
$route['personnel'] = 'ControllerPersonnel/load_personnel';
$route['login'] = 'Login/login';
$route['logout'] = 'Login/logout';
$route['dashboard'] = 'Welcome/dashboard';
