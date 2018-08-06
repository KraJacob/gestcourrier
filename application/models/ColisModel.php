
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
			 $gare = $this->session->userdata("id_gare");
			$query = $this->db->get_where('colis', array('etat' => "envoyé",'id_gare'=>"$gare"));
			return $query->result_array();
		 }

		 public function get_colis_recu()
		 {
			$gare = $this->session->userdata("id_gare");
			$query = $this->db->get_where('colis', array('etat' => "envoyé",'lieu_reception'=>"$gare"));
			return $query->result_array();
		 }

		 public function get_valeur_colis_envoye_jour($date)
		 {
			 $query = $this->db->query("SELECT SUM(montant) as val from colis where colis.date_create = '$date'");
			 $result = $query->row();
			 return $result->val;
		 }

		 public function get_valeur_colis_envoye_between($date1,$date2)
		 {
			 $query = $this->db->query("SELECT SUM(montant) as val from colis where colis.date_create BETWEEN '$date1' AND '$date2' ");
			 $result = $query->row();
			 return $result->val;
		 }

		 public function detail_colis()
		 {
			 $query = $this->db->query("SELECT * FROM `colis` JOIN gare on colis.id_gare = gare.id_gare GROUP BY colis.date_create, gare.lib_gare");
			 return $query->result();
		 }

		 public function valider_colis($id_colis,$data)
		 {
			 return $this->db->where("id_colis",$id_colis)
											 ->update("colis",$data);
											 
		 }
		 public function valider_colis_destinataire($id_destinataire,$data_destinataire)
		 {
			 return $this->db->where("id_destinataire",$id_destinataire)
											 ->update("destinataire",$data_destinataire);

		 }

		 public function get_detail_colis($id_colis)
		 {
			$gare = $this->session->userdata("id_gare");
			$query = $this->db->query(" SELECT * FROM `colis`,`type_colis`,`destinataire`,`expediteur` WHERE `colis`.`id_colis` = $id_colis 
			AND `colis`.`id_type_colis` = `type_colis`.`id_type_colis` AND `colis`.`id_destinataire` = `destinataire`.`id_destinataire` AND `colis`.`id_expediteur` = `expediteur`.`id_expediteur` ");
			return $query->result_array();
		 }

		 public function delete($ids)
		 {
				
			$this->db->set('statut', 'supprimé');
			$this->db->or_where_in('id_colis', $ids);
			return $this->db->update('colis');
		
		 }

		 public function get_colis_by_id($id)
			{
				$query = $this->db->query("SELECT * FROM colis JOIN expediteur ON colis.id_expediteur = expediteur.id_expediteur
				 JOIN destinataire ON colis.id_destinataire = destinataire.id_destinataire WHERE colis.id_colis = $id ");
				return $query->result_array();
			}

			public function update_expediteur($id_expediteur,$data)
			{
				return $this->db->where("id_expediteur",$id_expediteur)
												->update("expediteur",$data);
												
			}

			public function update_destinataire($id_destinataire,$data)
			{
				return $this->db->where("id_destinataire",$id_destinataire)
												->update("destinataire",$data);
												
			}

			public function montantColisJour()
            {
                $date = date("d/m/Y");
               $query = $this->db->select_sum('montant')
                     ->get_where('colis',array('date_create'=>$date));
                if ($query){
                    return $query->result_array();
                }else{

                    return 0;
                }
            }

        public function montantBagageJour()
        {
            $date = date("d/m/Y");
           $query = $this->db->select_sum('prix')
                ->get_where('bagage',array('date'=>$date));
           if ($query){
               return $query->result_array();
           }else{

               return 0;
           }

        }

        public function depenseJour()
        {
            $date = date("d/m/Y");
           $query = $this->db->get_where('depense',array('date'=>$date));
           return $query->result_array();
        }
	

    }
