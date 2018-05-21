
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  
    function __construct() {
            parent::__construct();
            $this->load->model('Connexion');
            
        } 

    	/*public function _remap($method, $params = array())
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
        } */
      
      public function login()
      {
        $timeOut = 1800;
        $now = time();
        $date = date("d-m-Y");
        $heure = date("H:i:s");
        $useremail = $this->input->post('email');
        $password = md5($this->input->post('password'));      
        $validCredentials = $this->Connexion->validCredentials($useremail,$password);
                  
      $data = $validCredentials;
      //print_r($data); exit();
       if($data)
       {
         
          $id = $data[0]['user_id'];                            
          $this->session->set_userdata("success", TRUE); 
          $this->session->set_userdata('session_time',$now);
          $this->session->set_userdata('timeOut',$timeOut);
          $this->session->set_userdata('useremail',$useremail);
          $this->session->set_userdata('user_id',$data[0]['user_id']);
          $this->session->set_userdata('nom',$data[0]['nom']);
          $this->session->set_userdata('prenom',$data[0]['prenom']);
		  $this->session->set_userdata('gare',$data[0]['lib_gare']);
		  $this->session->set_userdata('id_gare',$data[0]['id_gare']);
          $this->session->set_userdata('ville',$data[0]['ville']);
          $this->session->set_userdata($date,$data);
          $this->session->set_userdata($heure,$data);
        
         // $data["erreur"]="";
         // echo json_encode($data);
          redirect('dashboard');
  
    }else{
       // $data["erreur"]="erreur";
        //echo json_encode($data);
        $this->session->set_flashdata("echec","echec");
        redirect('welcome');
    }

     
    }

    public function logout()
        
    {   
        $array_items = array('success','useremail', 'password','username');
        $this->session->unset_userdata($array_items);
       // $this->Connexion->update_historique($this->session->userdata('id'));
        $this->session->sess_destroy();	
        return redirect('welcome');
    }
}

    ?>
