
<?php 
    class VehiculeModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
       }

       public function add_vehicule($data)
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
            return  $this->db->insert('vehicule', $data);
          
       }

       public function list_vehicule()
       {
           $query = $this->db->get("vehicule");

           return $query->result_array();
       }

    }