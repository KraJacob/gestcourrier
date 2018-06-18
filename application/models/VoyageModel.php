
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

       
       public function check_num_siege($num_depart,$num_siege,$date,$id_gare){
        $query = $this->db->query("SELECT `depart`.`id_depart`,num_depart,`depart`.`date_ajout`, id_passager,num_siege,`passager`.`id_depart` FROM depart,passager WHERE `depart`.`id_gare`='$id_gare' AND `depart`.`id_depart` =`passager`.`id_depart`  AND `depart`.`date_ajout`='$date' AND num_depart ='$num_depart' AND num_siege='$num_siege'");
		 
				$result = $query->row();
				
        if($result){
          return $result->num_siege;
        }else{
          return null;
        }
         
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
        $query = $this->db->query("SELECT `depart`.`num_depart` FROM depart WHERE parcours='$parcours' AND depart.date_ajout='$date'
				 AND depart.place_disponible > 0");
        $result = $query->row();
        if($result){
          return $result->num_depart;
        }else{
          return null;
        }
           
       }

       public function get_ville_arrive_by_id($id)
       {
         $query = $this->db->query("SELECT ville_arrive from destination where id_destination =$id");
         $result = $query->row();
         return $result->ville_arrive;
			 }

			 public function check_depart_en_cours($date,$heure,$parcours)
			 {
				 $query = $this->db->query("SELECT * FROM depart WHERE depart.date_depart='$date' AND depart.heure_depart='$heure' AND depart.parcours='$parcours'");
				 if($query->num_rows() > 0)
				 {
					$result = $query->row();
					return $result->id_depart;
				 }else{
					 return false;
				 }
			 }
			 
			public function update_depart($id,$data)
			{
				return $this->db->where('id_depart', $id)
            ->Update('depart',$data);
			}

			public function valider_depart($num_depart,$parcours,$date)
			{
				$data["etat"] = "fin chargement";
				return $this->db->where('num_depart', $num_depart)
					 ->where('parcours',$parcours)
					 ->where('date_depart',$date)
           ->Update('depart',$data);
			}

			public function check_num_siege_reservation($date_depart,$num_depart,$num_siege,$id_gare)
			{
				$data = array();
				$query = $this->db->get_where("reservation",array('date_depart'=>$date_depart,'num_depart'=>$num_depart,'num_siege'=>$num_siege,'id_gare'=>$id_gare));
				$req = $this->db->query("SELECT * FROM `depart`, `passager` WHERE depart.date_depart='$date_depart' AND depart.num_depart = $num_depart
				AND passager.num_siege = $num_siege AND depart.id_depart = passager.id_depart");
				if($query->num_rows() >0){
					$data = $query->result_array();
				}elseif($req->num_rows() >0){
					$data = $req->result_array();
				}
			  return $data;
			}

			public function reservation($data)
			{
			return	$this->db->insert('reservation',$data);

			}

			public function getreservation()
			{
				$ville = $this->session->userdata("ville");
				$query = $this->db->query("SELECT * FROM reservation,destination WHERE reservation.id_destination = destination.id_destination AND reservation.etat='reservation en cours' ORDER BY id_reservation DESC");
				return $query->result();
			}

			/*public function get_passager_jour()
			{
				$date = date("d/m/Y");
				$gare = $this->session->userdat("id_gare");
				$query = $this->db->query(" SELECT * FROM ")
			} */

			public function get_valeur_depart_jour($date)
			{
				$query = $this->db->query("SELECT SUM(tarif) as val from passager where passager.date_create = '$date' ");
		    $result = $query->row();
		    return $result->val;  
			}

			public function get_valeur_depart_between($date1,$date2)
			{
				$query = $this->db->query("SELECT SUM(tarif) as val from passager where passager.date_create BETWEEN '$date1' AND '$date2' ");
		    $result = $query->row();
		    return $result->val;  
			}

			public function get_depart_reservation($id_gare,$date)
			{
				$query = $this->db->get_where("depart",array('id_gare'=>$id_gare,'date_depart'=>$date));
				return $query->result_array();
			}

			public function get_reservation_by_id($id)
			{
				$query = $this->db->get_where('reservation',array('id_reservation'=>$id));
				return $query->result_array();
			}

			public function updata_reservation($id,$data){
				return $this->db->where('id_reservation', $id)
				->Update('reservation',$data);
			}

			public function delete($ids)
			{
				 
			 $this->db->set('statut_reservation', 'supprimé');
			 $this->db->or_where_in('id_reservation', $ids);
			 return $this->db->update('reservation');
		 
			}
 

    }
