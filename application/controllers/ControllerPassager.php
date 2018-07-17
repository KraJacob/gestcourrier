<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerPassager extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('PassagerModel');
					$this->load->model('VoyageModel');
					$this->load->model('PersonnelModel');
					$this->load->model('VehiculeModel');
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
              
              public function load_type_passager()
              {

                  $this->load->view("passager/type_passager");
              }

              public function add()
              {
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
                unset($data['sumbmit']);
               if($this->PassagerModel->add_type_passager($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('type_passager');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('type_passager');
               }
				
              }

        public function list_type_passager()
         {        
			$table  = 'passager`, `depart`,`destination';

			$primaryKey = 'passager`.`id_passager';

			$columns = array(
				array(
					'db' => 'passager`.`id_passager', 
					'field'=>'id_passager',
					'dt' => 'DT_RowId',
					'formatter' => function($d, $row) {
						return 'row_'.$d;
					}
				),
				array(
					'db' => 'passager`.`id_passager',
					'field'=>'id_passager',
				 	'dt' => 'checkbox',
				 	'formatter' => function($d, $row) {
				 		return "";
				 	}
				 ),
				array('db' => 'nom', 'dt' => 'nom'),		
				array('db' => 'prenom',	'dt' => 'prenom'),
				array('db' => 'mobile', 'dt' => 'mobile'),
				array('db' => 'type_passager', 'dt' =>'type_passager'),
				array(
					'db' => 'passager`.`date_create',
					'field' => 'date_create', 
					'dt' => 'date_create'	

				),
				array('db' => 'num_siege', 'dt' =>'num_siege'),
				array('db' => 'ville_arrive', 'dt' =>'ville_arrive'),
				array('db' => 'num_depart', 'dt' =>'num_depart'),
				
				array(
					'db' => 'passager`.`id_depart',
					'field' => 'id_depart',
					'dt' => 'id_depart'
				),
				array(
					'db' => 'passager`.`id_destination',
					'field' => 'id_destination',
					'dt' => 'id_destination'
				)
				
			);
			$whereClause = "`passager`.`id_depart` = `depart`.`id_depart` AND `passager`.`id_destination` = `destination`.`id_destination` AND passager.statut = 'Actif'";
          	require('ssp.php');
			
			echo json_encode(
				array(
					"draw"            => isset ( $request['draw'] ) ?
						intval( $request['draw'] ) :
						0,
					"recordsTotal"    => intval($totalData ),
					"recordsFiltered" => intval( $totalFiltered ),
					"data"            => $out
				)
			, JSON_UNESCAPED_UNICODE);

			  }
			  
			  public function load_list_passager()
			  {
				  $this->load->view('passager/listPassager');
			  }

			  public function detail_depart()
			  {
				       	// les Variables de datatable
               //
			   $draw = intval($this->input->post("draw"));
			   //
			   $entreprise_id = $this->session->userdata("entreprise_id");
			  // echo $entreprise_id; exit();
			   $start = intval($this->input->post("start"));
			   $length = intval($this->input->post("length"));
		     $details_depart = $this->PassagerModel->detail_depart();

			 $data = array();
			 if(count($details_depart)>0)
			 {
			 foreach( $details_depart as $r){	
					$tab = array();
					$tab[] = $r->id_depart;
					//$tab[] = '<td></td>';
					$tab[] =$r->date_depart;
					$tab[] =$r->lib_gare;
					$tab[] =$r->immatriculation;
					$tab[] =$r->num_depart;
					$tab[] =$r->place_disponible;
					$tab[] =$r->total; 
					$data[] = $tab;
				
				}

				}	

				$output = array(
					"draw" => $draw,
						"recordsTotal" => count($details_depart),
						"recordsFiltered" => count($details_depart),
						"data" => $data
					);
				
				echo json_encode($output);
			  }

			  public function load_detail_depart()
			  {
				  $this->load->view("passager/detail_depart");
			  }

			  public function valider_reservation()
			  {

				$id_gare = $this->session->userdata("id_gare");
				$user_id = $this->session->userdata("user_id");
				$id = $this->input->get("idreservation");
				//echo $id; exit();
				$reservation = array();
				$data_passager = array();
				$reservation = $this->PassagerModel->get_reservation($id);
				$date = $reservation[0]["date_depart"];
				$data = array();
				//echo"gare ".$id_gare." date".$date; 
				$depart = $this->VoyageModel->get_depart_reservation($id_gare,$date);
				$data['etat'] = "reservation validée";
				$data_passager["nom"] = $reservation[0]["nom"];
				$data_passager["prenom"] = $reservation[0]["prenom"];
				$data_passager["mobile"] = $reservation[0]["mobile"];
				$data_passager["num_siege"] = $reservation[0]["num_siege"];
				$data_passager["date_create"] = date("d/m/Y");
				$data_passager["id_destination"] = $reservation[0]["id_destination"];
				$data_passager["tarif"] = $reservation[0]["tarif"];
				$data_passager["type_passager"] = $reservation[0]["type_passager"];				
				$data_passager['user_id'] = $user_id;				
			
				if($this->PassagerModel->valider_reservation($id,$data))
				{
					//if()
					//echo json_encode($reservation);
					if($depart){
						$data_depart = array();
						$data_depart['place_disponible'] = $depart[0]["place_disponible"] - 1;
						$this->VoyageModel->add_passager($data_passager);
						$this->VoyageModel->update_depart($depart[0]["id_depart"],$data_depart);
						$data_passager["destination"] = $this->VoyageModel->get_ville_arrive_by_id($reservation[0]["id_destination"]);
						$data_passager["id_depart"] = $depart[0]["id_depart"];
						$data_passager["heure_depart"] = $depart[0]["heure_depart"];						
						$this->load->view("voyage/fiche_voyage",$data_passager);
						
					}else{

						$vehicule = $this->VehiculeModel->list_vehicule();
						$chauffeur = $this->PersonnelModel->get_chauffeur();
						$convoyeur = $this->PersonnelModel->get_convoyeur();
						$destination = $this->VoyageModel->get_destination();
						$data["vehicule"] = $vehicule;
						$data["chauffeur"] = $chauffeur;
						$data["convoyeur"] = $convoyeur;
						$data["id_destination"] = $destination;
						$data["passager"] = $data_passager;
						$data["reservation_destination"] = $this->VoyageModel->get_ville_arrive_by_id($reservation[0]["id_destination"]);
						//var_dump($data);exit();
						$this->load->view("voyage/register_voyage",$data);
						//return redirect(base_url().'Voyage/load_voyage/'.$data);

					}
				} 
			  }
              
            }

            ?>
