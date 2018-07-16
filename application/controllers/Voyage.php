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
		
				public function _remap($method, $params = array())
				{
							  
					if (method_exists($this, $method))
					{ 
						
					if($this->session->userdata("success")){
						return call_user_func_array(array($this, $method), $params);
						}else{
							redirect("welcome");
						}
					  }
					show_404();
				}
			  
			public function index()
			{
				
				$this->load->view('dashboard');
			}
		
			//Chargement de la fenêtre d'un passager
			public function load_voyage()
			{
				$data = array();
				$date = date("d/m/Y");
				 $num_depart_en_cour=0;
				$id_gare = $this->session->userdata("id_gare");
				//echo "parcours ".$parcours." date ". $date;exit();
				
				$depart = $this->VoyageModel->get_num_depart_en_cours($id_gare,$date);
				//var_dump($depart); exit();
				if($depart){
					$num_depart = $depart[0]['num_depart'];
				$place_disponible = $depart[0]['place_disponible'];
				$etat = $depart[0]['etat'];
               // echo $etat;exit();
				if($etat=="fin chargement"){
					$num_depart_en_cour = $num_depart + 1;
				}elseif($etat=="chargement en cours" && $place_disponible == 0){
                    $num_depart_en_cour = $num_depart + 1;   
				}else{
					$num_depart_en_cour = $num_depart;
					//var_dump($depart);exit();
				    $chauffeur_depart = $this->VoyageModel->check_chauffeur_for_depart($num_depart,$date);
				    //print_r($chauffeur_depart);exit();
					$convoyeur_depart = $this->VoyageModel->check_convoyeur_for_depart($num_depart,$date);
					$data["chauffeur_depart"] = $chauffeur_depart;
					$data["convoyeur_depart"] = $convoyeur_depart;
					$data["num_depart"] = $num_depart_en_cour;
				}
				}
								
				$vehicule = $this->VehiculeModel->list_vehicule();
                $chauffeur = $this->PersonnelModel->get_chauffeur();
				$convoyeur = $this->PersonnelModel->get_convoyeur();
				$destination = $this->VoyageModel->get_destination();
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
				$date = date("d/m/Y");
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
				if($this->input->post()==null)
				{
                  return redirect('voyage');
				}else {
                    $user_id = $this->session->userdata("user_id");
                    $id_gare = $this->session->userdata("id_gare");
                    $type_passager = $this->input->post("type_passager");
                    $nom = $this->input->post("nom");
                    $prenom = $this->input->post("prenom");
                    $mobile = $this->input->post("mobile");
                    $ville_depart = $this->input->post("ville_depart");
                    $destination = $this->input->post("ville_arrive");
                    $num_siege = $this->input->post("num_siege");
                    $tarif = $this->input->post("tarif");
                    $data_passager = array();

                    $id_depart = $this->VoyageModel->get_last_id_depart();
                    $data_passager["nom"] = $nom;
                    $data_passager["prenom"] = $prenom;
                    $data_passager["mobile"] = $mobile;
                    $data_passager["num_siege"] = $num_siege;
                    $data_passager["date_create"] = date("d/m/Y");
                    $data_passager["date_depart"] = date("d/m/Y");
                    $data_passager["id_destination"] = $destination;
                    $data_passager["tarif"] = $tarif;
                    $data_passager["type_passager"] = $type_passager;
                    $data_passager["id_depart"] = $id_depart;
                    $data_passager['user_id'] = $user_id;
                    $data_passager['id_gare'] = $id_gare;
                    $this->VoyageModel->add_passager($data_passager);
                    $data_passager["destination"] = $this->VoyageModel->get_ville_arrive_by_id($destination);
                    $this->load->view("voyage/fiche_voyage", $data_passager);
                }
				
			}

			public function add_depart()
            {
                $date = date("d/m/Y");

                $data_affectation = array();
                $data_depart = array();
                $chauffeur = $this->input->post("chauffeur");
                $convoyeur = $this->input->post("convoyeur");
                $num_depart = $this->input->post("num_depart");
                $user_id = $this->session->userdata("user_id");
                $id_gare = $this->session->userdata("id_gare");
                $immatriculation = $this->input->post("immatriculation");
                $heure_depart = $this->input->post("heure_depart");
                $place_dispo = $this->input->post("place_disponible");
                $date_depart = $this->input->post("date_depart");
                $parcours = $this->input->post("parcours");
                $data_depart["parcours"] = $parcours;
                $data_depart["date_depart"] = $date_depart;
                $data_depart["heure_depart"] = $heure_depart;
                $data_depart["num_depart"] = $num_depart;
                $data_depart["date_depart"] = $date;
                $data_depart["place_disponible"] = $place_dispo;
                $data_depart["immatriculation"] = $immatriculation;
                $data_depart["user_id"] = $user_id;
                $data_depart["id_gare"] = $id_gare;
                $data_depart["etat"] = "chargement en cours";
                $data_depart["date_ajout"] = Date("d/m/Y");

                echo $this->VoyageModel->add_depart($data_depart);

                $id_depart = $this->VoyageModel->check_depart_en_cours($date_depart,$heure_depart,$parcours);
                $id_depart;

                //Affectation du personnel au véhicule
                $data_affectation["immatriculation"] = $immatriculation;
                $data_affectation["id_personnel"] = $chauffeur;
                $data_affectation["date_affectation"] = date("d/m/Y");
                $data_affectation['user_id'] = $user_id;
                $this->VoyageModel->add_affectation($data_affectation);
                $data_affectation["id_personnel"] = $convoyeur;
                $this->VoyageModel->add_affectation($data_affectation);
            }

			public function check_num_siege()
			{
				
				$id_gare = $this->session->userdata("id_gare");
				$num_siege = $this->input->get("num_siege");
				$num_depart = $this->input->get("num_depart");				
				$date = date("d/m/Y");
				// echo"siege ".$num_siege." depart ".$num_depart."parcours".$parcours."date".$date;exit();
				if($this->VoyageModel->check_num_siege($num_depart,$num_siege,$date,$id_gare))
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

			//Validation du depart
		public function valider_depart()
		{
			
				$num_depart = $this->input->post('num_depart');
				$id_depart = $this->session->userdata('id_gare');
				$date_depart = $this->input->post('date');
				 if($num_depart)
					if($this->VoyageModel->valider_depart($num_depart,$id_depart,$date_depart)){
					$data["error"] = "";
					echo json_encode($data);
					}else{
					$data["error"] = "An error occured";
					echo json_encode($data);
	
					}
			}

			public function load_reservation()
			{   
				$data = array();
				$data["destination"] = $this->VoyageModel->get_destination();
				$this->load->view("voyage/reservation",$data);
			}

			public function check_num_siege_reservation()
			{
				$num_depart = $this->input->get("num_depart");
				$date_depart = $this->input->get("date_depart");
				$num_siege = $this->input->get("num_siege");
				$id_gare = $this->session->userdata("id_gare");
				$result = 0;

				if($this->VoyageModel->check_num_siege_reservation($date_depart,$num_depart,$num_siege,$id_gare))
				{
					$result = 1;

					echo json_encode($result);
				}else{

					echo json_encode($result);
				}

			}
			
			public function add_reservation()
			{
				$update = $this->input->post("update");             
				$data = $this->input->post(); 
				$data['date_reservation'] = date("d/m/Y");
				$data['id_gare'] = $this->session->userdata("id_gare");
				$data['user_id'] = $this->session->userdata("user_id");
				$data['etat'] = "reservation en cours";
				//var_dump()
				unset($data['ville_depart']);
				unset($data['reservation_length']);
				unset($data['update']);
				if(!$update){
					if($this->VoyageModel->reservation($data))
					{
						$this->session->set_flashdata("confirme",1);
						redirect("reservation");
					}else{
						$this->session->set_flashdata("confirme", 0);
						redirect("reservation");	
					}
				}
				else
				{
					if($this->VoyageModel->updata_reservation($update,$data))
					{
						$this->session->set_flashdata("confirme", 1);
						redirect("reservation");
					}else{
						$this->session->set_flashdata("confirme",0);
						redirect("reservation");	
					}
				}
				
			}	
			
				//Lister des réservation
	public function list_reservation(){
		// les Variables de datatable
		   //
		   $draw = intval($this->input->post("draw"));
		    $start = intval($this->input->post("start"));
		   $length = intval($this->input->post("length"));
		 $reservation = $this->VoyageModel->getreservation();

		 $data = array();
		 if(count($reservation)>0)
		 {
		 foreach( $reservation as $r){	
			 if($r->statut_reservation=="Actif"){
				 $tab = array();
				$tab[] = $r->id_reservation;
				$tab[] = $r->nom." ".$r->prenom;
				$tab[] =$r->mobile;
				$tab[] =$r->date_reservation;
				$tab[] =$r->date_depart;
				$tab[] =$r->ville_arrive; 
				$tab[] = $r->tarif;
				$data[] = $tab;
			 }
				
				}

			}	

			$output = array(
				"draw" => $draw,
					"recordsTotal" => count($reservation),
					"recordsFiltered" => count($reservation),
					"data" => $data
				);
			
			echo json_encode($output);					
						
	   }
	   
	   
	   public function get_reservation_update(){
		$id = $this->input->post("id");
		$reservation = $this->VoyageModel->get_reservation_by_id($id);
		echo json_encode($reservation);
	  }

	  public function delete()
			  {
				$reservation = $this->input->post('selected');
				if($reservation!=""){
					if($this->VoyageModel->delete($reservation)){
				$data["error"] = "";
				echo json_encode($data);
	  
			  }else{
				$data["error"] = "An error occured";
				echo json_encode($data);
	  
			  }
				}	  
			  
			  }

}
