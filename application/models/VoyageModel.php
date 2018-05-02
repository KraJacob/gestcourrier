
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
        $ville_depart = $this->session->userdata("ville");
        $query = $this->db->query("SELECT id_destination,ville_arrive FROM destination WHERE ville_arrive <> '$ville_depart'");

         return $query->result_array();   
       }

       
       public function check_num_siege($num_depart,$num_siege,$date,$parcours){
        $query = $this->db->query("SELECT `depart`.`id_depart`,num_depart,`depart`.`date_ajout`, id_passager,num_siege,`passager`.`id_depart` FROM depart,passager WHERE `depart`.`parcours`='$parcours' AND `depart`.`id_depart` =`passager`.`id_depart`  AND `depart`.`date_ajout`='$date' AND num_depart ='$num_depart' AND num_siege='$num_siege'");

        $result = $query->row();

        return $result->num_siege;   
       }

       public function add_depart($data)
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
            return  $this->db->insert('depart', $data);
          
       }

       public function get_last_id_depart()
       {
           $query = $this->db->query("SELECT id_depart from depart ORDER BY id_depart DESC LIMIT 1");
           $result = $query->row();
           return $result->id_depart;
       }

       public function add_passager($data)
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
            return  $this->db->insert('passager', $data);
          
       }

       public function add_affectation($data)
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
          return  $this->db->insert('affecter', $data);  
       }

       public function check_chauffeur_for_depart($num_depart,$date_depart)
       {
         $query = $this->db->query("SELECT * FROM depart INNER JOIN vehicule on depart.immatriculation = vehicule.immatriculation
          INNER JOIN affecter ON vehicule.immatriculation=affecter.immatriculation 
          INNER JOIN personnel on affecter.id_personnel=personnel.id_personnel 
          INNER JOIN type_personnel ON personnel.id_type_personnel = type_personnel.id_type_personnel 
          WHERE type_personnel.lib_personnel='CHAUFFEUR' AND depart.date_ajout='$date_depart' AND depart.num_depart='$num_depart' LIMIT 1");

          return $query->result_array();
       }
       public function check_convoyeur_for_depart($num_depart,$date_depart)
       {
         $query = $this->db->query("SELECT * FROM depart INNER JOIN vehicule on depart.immatriculation = vehicule.immatriculation
          INNER JOIN affecter ON vehicule.immatriculation=affecter.immatriculation 
          INNER JOIN personnel on affecter.id_personnel=personnel.id_personnel 
          INNER JOIN type_personnel ON personnel.id_type_personnel = type_personnel.id_type_personnel 
          WHERE type_personnel.lib_personnel='CONVOYEUR' AND depart.date_ajout='$date_depart' AND depart.num_depart='$num_depart' LIMIT 1");

         return $query->result_array();
       }

       public function get_num_depart_en_cours($parcours,$date){
        $query = $this->db->query("SELECT `depart`.`num_depart` FROM depart WHERE parcours='$parcours' AND depart.date_ajout='$date' AND depart.place_disponible > 0");
        $result = $query->row();
        if($result){
          return $result->num_depart;
        }else{
          return null;
        }
           
       }

    }