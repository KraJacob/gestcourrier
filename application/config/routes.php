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
$route['dashboard'] = 'Controlleruser/dashboard';
$route['dashboard2'] = 'Controlleruser/dashboard2';
$route['voyage'] = 'Voyage/load_voyage';
$route['reservation'] = 'Voyage/load_reservation';
$route['colis'] = 'ControllerColis/listeColis';
$route['colis_recu'] = 'ControllerColis/listeColis/recu';
$route['colis_envoye'] = 'ControllerColis/listeColis/envoye';
$route['add_colis']='ControllerColis/add_colis';
$toute['fiche_colis'] = 'ControllerColis/fiche_colis';
$toute['ticket/(:any)'] = 'Voyage/pdf/$1'; 
$route['passager'] = 'ControllerPassager/load_list_passager';
$route['print_recu']='ControllerColis/print_recu';
$route['depenses'] = 'ControllerDepense/load_depense';
$route['add_depense'] = 'ControllerDepense/add_depense';
$route['detail_passager'] = 'ControllerPassager/load_detail_depart';
$route['detail_colis_envoye'] = 'ControllerColis/load_detail_colis';
$toute['valider_colis/(:any)'] = 'ControllerColis/valider_colis/$1'; 
$route['voir/(:any)'] = 'ControllerColis/get_detail_colis/$1';
$route['retraitcolis'] = 'ControllerColis/retrait_colis';
$route['delete_colis'] = 'ControllerColis/delateColis';
$route['delete_personnel'] = 'ControllerPersonnel/delete';
$route['delete_reservation'] = 'Voyage/delete';
$route['bagage'] = 'BagageController/loadBagage';
$route['add_bagage'] = 'BagageController/saveBagage';
$route['annuler_ticket'] = 'Voyage/annulerTicket';
