
<?php 
    class VoyageModel extends CI_model 
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

       public function nbre_passager_jour($imat,$date_jour)
       {
           $query = $this->db->query("SELECT immatriculation,date_create, count(id_passager) AS nbre FROM passager,depart WHERE `passager`.`id_depart`=`depart`.`id_depart` AND immatriculation='$imat' AND date_create = '$date_jour'");

           $result = $query->row();

           return $result->nbre;
       }

       public function nbre_place_veh($imat)
       {
        $query = $this->db->query("SELECT nbr_place FROM vehicule WHERE immatriculation='$imat'");

        $result = $query->row();

        return $result->nbr_place;   
       }

       public function get_tarif($ville_depart,$ville_arrive)
       {
        $query = $this->db->query("SELECT tarif FROM destination WHERE ville_depart='$ville_depart' AND ville_arrive='$ville_arrive'");
        
        $result = $query->row();

         return $result->tarif;   
       }

       public function get_destination()
       {
        $query = $this->db->query("SELECT id_destination,ville_arrive FROM destination");

         return $query->result_array();   
       }

    }