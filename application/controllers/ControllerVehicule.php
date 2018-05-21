
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerVehicule extends CI_Controller {
  
    function __construct() {
            parent::__construct();
            $this->load->model('VehiculeModel');
            
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
      
      public function load_vehicule()
      {
          $this->load->view("vehicule/add_vehicule");
      }

      public function add_vehicule()
      {
        $data = $this->input->post();
        $statut = "Actif";
        $date_create = date("Y-m-d H:i:s");
        $data['statut'] = $statut;
        $data["date_create"] = $date_create;
        unset($data['sumbmit']);
       if($this->VehiculeModel->add_vehicule($data))
       {
        $this->session->set_flashdata("success","success");
        return redirect('add_vehicule');
       }else{
        $this->session->set_flashdata("echec","echec");
        return redirect('add_vehicule');
       }
        
      }
    }

    ?>
