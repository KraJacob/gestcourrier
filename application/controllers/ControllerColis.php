
<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerColis extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('ColisModel');
					$this->load->model('PersonnelModel');
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
              

              public function load_type_colis()
              {
                  $this->load->view("colis/type_colis");
			  }
			public function load_colis()
              {
					 $data = array();
					 $data["type_colis"] = $this->ColisModel->get_type_colis();
					 $data["gare"] = $this->PersonnelModel->get_gare();
					//var_dump($data);exit();
                    $this->load->view("colis/add_colis",$data);
              }

              public function add_type_colis()
              {
				$user_id = $this->session->userdata("user_id");
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
				$data['user_id'] = $user_id;
                unset($data['sumbmit']);
               if($this->ColisModel->add_type_colis($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('type_colis');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('type_colis');
               }
				
							}
							
	public function add_colis()
	{   
		if($this->input->post()){
		
		$datadestinateur = array();
		$dataexpediteur = array();
		$datacolis = array();
		$data = array();
		$ref = $this->input->post("ref");
		$id_colis = $this->input->post("id_colis");
		//echo $id_colis; exit();
		$id_destinataire = $this->input->post("id_destinataire");
		$id_expediteur = $this->input->post("id_expediteur");
		$type_colis = $this->input->post("type_colis");
		$date_ajout = $this->input->post("date_ajout");
		$nom = $this->input->post("nom_exp");
		$prenom = $this->input->post("prenom");
		$mobile = $this->input->post("mobile");
		$nat_piece = $this->input->post("nat_piece");
		$num_piece = $this->input->post("num_piece");
		$nom_dest = $this->input->post("nom_dest");
		$prenom_dest = $this->input->post("prenom_dest");
		$mobile_dest = $this->input->post("mobile_dest");
		$remarque = $this->input->post("remarque");
		$lieu_reception = $this->input->post("lieu_reception");
		$pass = $this->input->post("pass");
		$valeur = $this->input->post("valeur");
		$montant = $this->input->post("montant");
		$user_id = $this->session->userdata("user_id");
		$etat = "envoyé";
		$datacolis["ref_colis"]=$ref;
		$datacolis["id_type_colis"]=$type_colis;
		$datacolis["date_create"]=$date_ajout;
		$datacolis["description"]=$remarque;
		$datacolis["lieu_reception"]=$lieu_reception;
		$datacolis["passe"]=$pass;
		$datacolis["id_gare"]=$this->session->userdata("id_gare");
		$datacolis["etat"]=$etat;
		$datacolis["user_id"]=$user_id;
		$datacolis["valeur"]= $valeur;
		$datacolis["montant"]=	$montant;

		$dataexpediteur["nom_expediteur"]=$nom;
		$dataexpediteur["prenom_expediteur"]=$prenom;
		$dataexpediteur["mobile_expediteur"]=$mobile;
		$dataexpediteur["nature_piece_expediteur"]=$nat_piece;
		$dataexpediteur["num_piece_expediteur"]=$num_piece;
		$dataexpediteur["date_expedition"]=$date_ajout;
		$dataexpediteur["user_id"]=$user_id;
		
		$datadestinateur["nom_destinataire"]=$nom_dest;
		$datadestinateur["prenom_destinataire"]=$prenom_dest;
		$datadestinateur["mobile_destinataire"]=$mobile_dest;
		$datadestinateur["date_create"]=date("d/m/Y");
		$datadestinateur["user_id"]=$user_id;
		
		$id_dest;
		$idexp;

		if(!$id_colis){
			if($dataexpediteur && $datadestinateur && $datacolis)
			{
			 if($this->ColisModel->add_expediteur($dataexpediteur))
				{
				$idexp = $this->ColisModel->get_last_expediteur();
				$datacolis["id_expediteur"]=$idexp;
				$this->ColisModel->add_destinataire($datadestinateur);
				$id_dest = $this->ColisModel->get_last_destinataire();
				$datacolis["id_destinataire"]=$id_dest;
				$this->ColisModel->add_colis($datacolis);
				$data=$datacolis + $dataexpediteur;
				$data["nom_dest"]=$nom_dest;
				$data["prenom_dest"]=$prenom_dest;
				$data["mobile_dest"]=$mobile_dest;
				//var_dump($data); exit();
				$this->load->view('colis/fiche_colis',$data);
			   // return redirect("fiche_colis");
			    //echo("add ok");
				}
			}else{
				//echo("add failed");
				return redirect('colis');
			}
		}else{
			if($dataexpediteur && $datadestinateur && $datacolis)
			{
				if($this->ColisModel->update_expediteur($id_expediteur,$dataexpediteur))
				{
				
				$datacolis["id_expediteur"]=$id_expediteur;

				$this->ColisModel->update_destinataire($id_destinataire,$datadestinateur);
				$this->ColisModel->valider_colis($id_colis,$datacolis);
			  //var_dump($data); exit();
			return redirect("colis");
			//echo("update");
				}
			}else{
				//echo("update failed");
				 return redirect('colis');
			}
		}
		

		}else{
			return redirect('colis');
		}
	}

			public function fiche_colis()
			{
				$this->load->view("colis/fiche_colis");
			}

			public function listeColis($etat="")
			{
				$data = array();

				//echo"etat : $etat";
				if($etat=="recu"){
				$data["etat"] = "reçu";
				}elseif($etat = "envoye"){
					$data["etat"] = "envoyé";
				}else{
					$data["etat"] = "";
				}
			//	print_r($data);exit();
				$data["type_colis"] = $this->ColisModel->get_type_colis();
				$data["gare"] = $this->PersonnelModel->get_gare();
				$this->load->view("colis/listColis",$data);
			}

			public function list_colis_json()
			{
				$table  = 'colis`,`type_colis';

				$primaryKey = 'colis`.`id_colis';

				$columns = array(
					array(
						'db' => 'colis`.`id_colis', 
						'field'=>'id_colis',
						'dt' => 'id_colis'
						),
					array(
						'db' => 'colis`.`id_colis', 
						'field'=>'id_colis',
						'dt' => 'DT_RowId',
						'formatter' => function($d, $row) {
							return 'row_'.$d;
						}
					),
					array(
						'db' => 'colis`.`id_colis',
						'field'=>'id_colis',
						'dt' => 'checkbox',
						'formatter' => function($d, $row) {
							return "";
						}
					),
					array('db' => 'ref_colis', 'dt' => 'ref_colis'),		
					array('db' => 'valeur',	'dt' => 'valeur'),
					array('db' => 'montant', 'dt' => 'montant'),
					array('db' => 'description', 'dt' => 'description'),
					array('db' => 'etat', 'dt' => 'etat'),
					array('db' => 'lib_type_colis', 'dt' =>'lib_type_colis'),
					array(
						'db' => 'colis`.`date_create',
						'field' => 'date_create', 
						'dt' => 'date_create'	

					),
												
					array(
						'db' => 'colis`.`id_type_colis',
						'field' => 'id_type_colis',
						'dt' => 'id_type_colis'
					),
					
				);
				
				$whereClause = "`colis`.`id_type_colis` = `type_colis`.`id_type_colis` AND `colis`.`statut`='Actif'";
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

				public function print_recu()
				{
					$this->load->view('colis/reportColis');
				}

				// public function load_detail_colis($etat="")
				// {
				// 	$data = array();
				// 	if($etat=="reçu"){
                //      $data["etat"] = "reçu";
				// 	}elseif($etat = "envoyé"){
				// 		$data["etat"] = "envoyé";
 				// 	}else{
				// 		 $data["etat"] = "";
				// 	 }
				// 	$this->load->view("colis/detail_colis",$data);
				// }

			 public function get_detail_colis($id_colis)
			 {
				/// echo $id_colis;
				 $data = array();

				 $data['detail_colis'] = $this->ColisModel->get_detail_colis($id_colis);

				 $this->load->view("colis/detail_colis",$data);
				 
				//var_dump($data); 
			  }

			  public function valider_colis()
			  {
				  $id = $this->input->get("id");
				  $data = array();
				  $data['etat'] = "reçu";
				  if($this->ColisModel->valider_colis($id,$data))
				  {
					 echo json_encode($data);
				  }
			  }
			  public function retrait_colis()
			  {
				  $id = $this->input->get("idcolis");
				  $data = array();
				  $data['etat'] = "retiré";
				  if($this->ColisModel->valider_colis($id,$data))
				  {
					 echo json_encode($data);
				  }
			  }

			  public function delateColis()
			  {
				$colis = $this->input->post('selected');
				if($colis!=""){
					if($this->ColisModel->delete($colis)){
				$data["error"] = "";
				echo json_encode($data);
	  
			  }else{
				$data["error"] = "An error occured";
				echo json_encode($data);
	  
			  }
				}	  
			  
			  }

			  public function get_colis_update(){
				$id = $this->input->post("id");
				$colis = $this->ColisModel->get_colis_by_id($id);
				echo json_encode($colis);
			  }

            }

            ?>
