
<?php 
    class ColisModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
       }

       public function add_type_colis($data)
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
            return  $this->db->insert('type_colis', $data);
          
	   }
	   
	   public function get_type_colis()
	   {
           $query = $this->db->get("type_colis");
		   return $query->result_array();
	   }
	   public function add_colis($data)
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
            return  $this->db->insert('colis', $data);
          
	   }
	   public function add_expediteur($data)
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
            return  $this->db->insert('expediteur', $data);
          
	   }

	   public function get_last_expediteur()
	   {
		   $query = $this->db->query("SELECT id_expediteur from expediteur ORDER BY id_expediteur DESC LIMIT 1");
		   $result = $query->row();
		   if($result){
			   return $result->id_expediteur;
		   }else{
			   return null;
		   }
	   }
	   public function add_destinataire($data)
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
            return  $this->db->insert('destinataire', $data);
          
	   }
	   public function get_last_destinataire()
	   {
		   $query = $this->db->query("SELECT id_destinataire from destinataire ORDER BY id_destinataire DESC LIMIT 1");
		   $result = $query->row();
		   if($result){
			   return $result->id_destinataire;
		   }else{
			   return null;
		   }
		 }
		 
		 public function get_colis_envoye()
		 {
			$query = $this->db->get_where('colis', array('etat' => "envoyé"));
			return $query->result_array();
		 }

    }
