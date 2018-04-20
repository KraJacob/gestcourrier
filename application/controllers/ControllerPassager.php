<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerPassager extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('PassagerModel');
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
              
            }

            ?>