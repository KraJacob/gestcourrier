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
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
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
                  $this->load->view("personnel/add_personnel",['type_personnel'=>$type_personnel]);
              }

              public function add_personnel()
              {
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
                unset($data['sumbmit']);
               if($this->PersonnelModel->add_personnel($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('personnel');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('personnel');
               }
				
              }

              public function load_gare()
              {
                  $this->load->view("gare/add_gare");
              }

              public function add_gare()
              {
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
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
				   //
				   $entreprise_id = $this->session->userdata("entreprise_id");
				  // echo $entreprise_id; exit();
				   $start = intval($this->input->post("start"));
				   $length = intval($this->input->post("length"));
				 $personnel = $this->PersonnelModel->get_personnel();
	            //  print_r($personnel); exit();
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
              
            }

            ?>
