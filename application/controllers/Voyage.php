<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class Voyage extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('VoyageModel');
					$this->load->model('VehiculeModel');
					$this->load->model('PersonnelModel');
					$this->load->library('session');
				} 
		
			/*	public function _remap($method, $params = array())
				{
							  
					if (method_exists($this, $method))
					{ 
						
					if($this->session->userdata("success")){
						return call_user_func_array(array($this, $method), $params);
						}else{
							redirect("Login");
						}
					  }
					show_404();
				}
			  */
			public function index()
			{
				
				$this->load->view('dashboard');
			}
		
			//Chargement de la fenêtre d'ajout des utilisateurs
			public function load_voyage()
			{
				$data = array();
				$vehicule = $this->VehiculeModel->list_vehicule();
                $chauffeur = $this->PersonnelModel->get_chauffeur();
				$convoyeur = $this->PersonnelModel->get_convoyeur();
				$destination = $this->VoyageModel->get_destination();
				$data["vehicule"] = $vehicule;
				$data["chauffeur"] = $chauffeur;
				$data["convoyeur"] = $convoyeur;
				$data["destination"] = $destination;
				$this->load->view('voyage/register_voyage',$data);
				  
			}

			public function place_disponible()
			{
				$imat = $this->input->get("imat");
				$date = date("j/m/Y");
				$nbre_passager_jour = $this->VoyageModel->nbre_passager_jour($imat,$date);
				$nbre_place_veh = $this->VoyageModel->nbre_place_veh($imat);
				$place_dispo = $nbre_place_veh - $nbre_passager_jour;
				echo json_encode($place_dispo);
			}

			public function get_tarif()
			{
				$ville_depart = $this->session->userdata("ville");
				$ville_arrive = $this->input->get("id");
				//print($ville_depart);exit();
				$tarif = $this->VoyageModel->get_tarif($ville_depart,$ville_arrive);
				$tarif = number_format($tarif, 0, ',', ' ');
				echo json_encode($tarif);
			}

}