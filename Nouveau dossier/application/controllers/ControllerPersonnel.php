<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerPersonnel extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
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
              
              public function load_type_personnel()
              {
                  $this->load->view("personnel/type_personnel");
              }

              public function add()
              {
				$data = $this->input->post();
				$user_id = $this->session->userdata("user_id");
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
				$data['user_id'] = $user_id;
                unset($data['sumbmit']);
               if($this->PersonnelModel->add_type_personnel($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('type_personnel');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('type_personnel');
               }
				
              }

              public function load_personnel()
              {   
                $type_personnel = array();
                  $type_personnel = $this->PersonnelModel->get_type_personel();
                 // var_dump($type_personnel);exit();
                  $this->load->view("personnel/add_personnel",array('type_personnel'=>$type_personnel));
              }

              public function add_personnel()
              {
				$user_id = $this->session->userdata("user_id");
				$id_gare = $this->session->userdata("id_gare");

                $data = $this->input->post();
                $statut = "Actif";
                $id_personnel =$data["update_personnel"];
               // echo("person ".$id_personnel); exit();
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
				$data['id_gare'] = $id_gare;
				$data['user_id'] = $user_id;
				unset($data['sumbmit']);
				unset($data['id_personnel']);
                  unset($data['update_personnel']);
				$result = array();
				if($id_personnel){
					if($this->PersonnelModel->update_personnel($id_personnel,$data))
						{
							$result["reseult"]="done";
							echo json_encode($result);
						}else{
							$result["reseult"]="";
							echo json_encode($result);
						}

				}else{
				//var_dump($data);exit();
					if($this->PersonnelModel->add_personnel($data))
					{
						$result["reseult"]="done";
						echo json_encode($result);
					}else{
						$result["reseult"]="failed";
						echo json_encode($result);
					}

				}
               
				
             }

              public function load_gare()
              {
                  $this->load->view("gare/add_gare");
              }

              public function add_gare()
              {
				$user_id = $this->session->userdata("user_id");
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
				$data['user_id'] = $user_id;
                unset($data['sumbmit']);
               if($this->PersonnelModel->add_gare($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('gare');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('gare');
               }
				
			  }
			  
			  //Lister les personnel
			public function listPersonnel(){
				// les Variables de datatable
				   //
				   $draw = intval($this->input->post("draw"));
				    // echo $entreprise_id; exit();
				   $start = intval($this->input->post("start"));
				   $length = intval($this->input->post("length"));
				 $personnel = $this->PersonnelModel->get_personnel();
	           // var_dump($personnel); exit();
				 $data = array();
				 if(count($personnel)>0)
				 {
				 foreach( $personnel as $r){	
	
					if($r->statut =="Actif")
					{
					$tab = array();
					$tab[] = $r->id_personnel;
					$tab[] = '<td></td>';
					$tab[] =$r->nom;
					$tab[] =$r->prenom;
					$tab[] =$r->mobile;
					$data[] = $tab;
					}
				}

				}	

				$output = array(
					"draw" => $draw,
						"recordsTotal" => count($personnel),
						"recordsFiltered" => count($personnel),
						"data" => $data
					);
				
				echo json_encode($output);			
								
		}

		public function delete()
			  {
				$ids_personnel = $this->input->post('selected');
				if($ids_personnel!=""){
					if($this->PersonnelModel->delete($ids_personnel)){
				$data["error"] = "";
				echo json_encode($data);	  
			  }else{
				$data["error"] = "An error occured";
				echo json_encode($data);
	  
			  }
				}	  
			  
			  }
			  
			  public function get_personnel_for_update(){
				  $id_personnel = $this->input->get('id_personnel');
				//  echo("id ".$id_personnel);
				  $data = $this->PersonnelModel->get_personnel_by_id($id_personnel);
				  //print_r($data);exit();
				  echo json_encode($data);
			  }
            }

            ?>
