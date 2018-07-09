<?php 
    class PersonnelModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
       }

       public function add_type_personnel($data)
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
            return  $this->db->insert('type_personnel', $data);
          
       }

       public function add_gare($data)
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
          return  $this->db->insert('gare', $data); 
       }

       public function get_gare()
       {
           $query = $this->db->get_where("gare",array("statut"=>"Actif"));

           return $query->result_array();
       }

       public function get_type_personel()
       {
           $query = $this->db->get_where("type_personnel",array("statut"=>"Actif"));

           return $query->result_array();
       }

       public function get_chauffeur()
       {
           $query = $this->db->query('SELECT * FROM personnel,type_personnel WHERE `personnel`.`statut`="Actif" AND `type_personnel`.`lib_personnel`="CHAUFFEUR" AND `personnel`.`id_type_personnel`=`type_personnel`.`id_type_personnel`');

           return $query->result_array();
       }

       public function get_convoyeur()
       {
           $query = $this->db->query('SELECT * FROM personnel,type_personnel WHERE `personnel`.`statut`="Actif" AND `type_personnel`.`lib_personnel`="CONVOYEUR" AND `personnel`.`id_type_personnel`=`type_personnel`.`id_type_personnel`');

           return $query->result_array();
       }

       public function add_personnel($data)
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
          return  $this->db->insert('personnel', $data); 
	   }
	   
	    //récupération des users 
		public function get_personnel()
		{
			$query= $this->db->query("select * from `personnel`");
		  //  $query = $this->db->get_where('user',array(''=>"");
		   // if($query->num_rows() >0){
				return $query->result();
		  //  }
		}

		public function get_personnel_by_id($id){
			$query = $this->db->get_where('personnel',array('id_personnel'=>$id));
			return $query->result_array();
		}

		public function update_personnel($id_personnel,$data)
			{
				return $this->db->where("id_personnel",$id_personnel)
								->update("personnel",$data);
												
			}

			public function delete($ids)
			{
				   
			   $this->db->set('statut', 'supprimé');
			   $this->db->or_where_in('id_personnel', $ids);
			   return $this->db->update('personnel');
		   
			}
    }
