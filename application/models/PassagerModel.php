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

       public function getPassager()
       {
           $query = $this->db->get("passager");
           return $query->result_array();
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
	   
	   public function detail_depart()
	   {
		  $query = $this->db->query("SELECT SUM(`passager`.`tarif`) AS total, `passager`.`user_id`,`depart`.`id_depart`,`depart`.`date_depart`,
		   `depart`.`place_disponible`,`depart`.`immatriculation`,`depart`.`num_depart`,`depart`.`etat`,`user`.`user_id`,
		   `gare`.`user_id`,`gare`.`lib_gare`
           from passager 
           join depart on passager.id_depart = depart.id_depart
           join `user` on depart.user_id = `user`.`user_id`
           join gare ON `user`.`id_gare` = gare.id_gare
		   GROUP BY depart.id_depart,depart.num_depart, gare.id_gare");
		   
		   return $query->result();
	   }

	   public function valider_reservation($id,$data)
	   {
		   return $this->db->where('id_reservation',$id)
		            ->update('reservation',$data);
	   }

	   public function count_passager()
			{
				$id_gare = $this->session->userdata("id_gare");
				$date = date("d/m/Y");
				$query = $this->db->query("SELECT COUNT(*) AS total FROM passager join `user` on passager.user_id = `user`.`user_id` 
				JOIN gare ON `user`.`id_gare` = gare.id_gare WHERE passager.date_create ='$date' AND gare.id_gare = $id_gare");
				$result= $query->row();
				return $result->total;
			}

	  public function get_reservation($id)
	  {
		  $query = $this->db->get_where("reservation",array("id_reservation"=>$id));
		  return $query->result_array();
	  }

	  public function get_passager_by_id($passager_id)
      {
          $query = $this->db->get_where('passager',array('id_passager'=>$passager_id));
          return $query->row_array();
      }

    }
