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
				$date = date("j/m/Y");
				$parcours;
				$ville_depart = $this->session->userdata("ville");
				if($ville_depart=="ABIDJAN"){
					$parcours = "ABIDJAN - ODIENE";
				}else{
					$parcours = "ODIENE - ABIDJAN";
				}
				//echo $parcours; echo $date;
				$num_depart = $this->VoyageModel->get_num_depart_en_cours($parcours,$date);
				//print_r($num_depart);exit();
				$chauffeur_depart = $this->VoyageModel->check_chauffeur_for_depart($num_depart,$date);
				//print_r($chauffeur_depart);exit();
				$convoyeur_depart = $this->VoyageModel->check_convoyeur_for_depart($num_depart,$date);
				$vehicule = $this->VehiculeModel->list_vehicule();
                $chauffeur = $this->PersonnelModel->get_chauffeur();
				$convoyeur = $this->PersonnelModel->get_convoyeur();
				$destination = $this->VoyageModel->get_destination();
				$data["chauffeur_depart"] = $chauffeur_depart;
				$data["convoyeur_depart"] = $convoyeur_depart;
				$data["vehicule"] = $vehicule;
				$data["chauffeur"] = $chauffeur;
				$data["convoyeur"] = $convoyeur;
				$data["destination"] = $destination;
				//print_r($data);exit();
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
				$ville_arrive = $this->input->get("destination");
				//print($ville_depart);exit();
				$tarif = $this->VoyageModel->get_tarif($ville_depart,$ville_arrive);
				//$tarif = number_format($tarif, 0, ',', ' ');
				echo json_encode($tarif);
			}

			public function add_voyage()
			{
				$user_id = $this->session->userdata("user_id");
				$type_passager = $this->input->post("type_passager");
				$nom = $this->input->post("nom");
				$prenom = $this->input->post("prenom");
				$mobile = $this->input->post("mobile");
				$ville_depart = $this->input->post("ville_depart");
				$destination = $this->input->post("ville_arrive");
				$num_siege = $this->input->post("num_siege");
				$tarif = $this->input->post("tarif");
				$place_dispo = $this->input->post("place_disponible");
				$date_depart = $this->input->post("date_depart");
				$heure_depart = $this->input->post("heure_depart");
				$immatriculation = $this->input->post("immatriculation");
				$chauffeur = $this->input->post("chauffeur");
				$convoyeur = $this->input->post("convoyeur");
				$parcours = $this->input->post("parcours");
				$num_depart = $this->input->post("num_depart");
				//echo $date_depart; exit();
				$data_depart = array();
				$data_passager = array();
				$data_affectation = array();

				$data_depart["parcours"] = $parcours;
				$data_depart["date_depart"] = $date_depart;
				$data_depart["heure_depart"] = $heure_depart;
				$data_depart["num_depart"] = $num_depart;
				$data_depart["place_disponible"] = $place_dispo;
				$data_depart["immatriculation"] = $immatriculation;
				$data_depart["user_id"] = $user_id;
				$data_depart["date_ajout"] = date("j/m/Y");
				$id_depart;
				if($this->VoyageModel->add_depart($data_depart))
				{
				$id_depart = $this->VoyageModel->get_last_id_depart();
				$data_passager["nom"] = $nom;
				$data_passager["prenom"] = $prenom;
				$data_passager["mobile"] = $mobile;
				$data_passager["num_siege"] = $num_siege;
				$data_passager["date_create"] = date("j/m/Y H:i");
				$data_passager["id_destination"] = $destination;
				$data_passager["type_passager"] = $type_passager;
				$data_passager["id_depart"] = $id_depart;
				$this->VoyageModel->add_passager($data_passager);
				}
    			$data_affectation["immatriculation"] = $immatriculation;
				$data_affectation["id_personnel"] = $chauffeur;
				$data_affectation["date_affectation"] = date("j/m/Y");
				$this->VoyageModel->add_affectation($data_affectation);
				$data_affectation["id_personnel"] = $convoyeur;
				$this->VoyageModel->add_affectation($data_affectation);
			}

			public function check_num_siege()
			{
				$parcours;
				$ville_depart = $this->session->userdata("ville");
				if($ville_depart=="ABIDJAN"){
					$parcours = "ABIDJAN - ODIENE";
				}else{
					$parcours = "ODIENE - ABIDJAN";
				}
				$num_siege = $this->input->get("num_siege");
				$num_depart = $this->input->get("num_depart");
				//echo"siege ".$num_siege." depart ".$num_depart;exit();
				$date = date("d/m/Y");
				if($this->VoyageModel->check_num_siege($num_depart,$num_siege,$date,$parcours))
				{
					echo json_encode(1);
				}else{
					echo json_encode(0);
				}
			}


			function pdf()
			{
				$this->load->helper('pdf_helper');
				/*
					---- ---- ---- ----
					your code here
					---- ---- ---- ----
				*/
				$this->load->view('voyage/pdfreport');
			}

}