<?php 
    class PassagerModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
       }

       public function add_type_passager($data)
       {
                       
           /* $date = date("d/m/Y");
            $date = explode("/",$date);
            $date = time($date);
            $data_activite = array( 
        
              'user_id' => $this->session->userdata("user_id"),
              'date_activite' => date("d/m/Y H:i"),
              'type_activite' => "ajout",
              'date_activite_stamp' => $date,
              'desc_activite' => "ajouté l'utilisateur " .  $data["username"] 
            );

            $this->db->insert('activites', $data_activite);
           */
            return  $this->db->insert('type_passager', $data);
          
       }

       public function get_type_passager()
       {
           $query = $this->db->get("type_passager");
           return $query->result();
       }
       public function get_depart()
       {
            
	   }
	   public function get_passager()
       {
		$query = $this->db->query("SELECT * FROM passager,user,gare WHERE passager.id_user=user.id_user AND user.");  
       }

    }
