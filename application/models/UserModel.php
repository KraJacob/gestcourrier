 
<?php 
    class UserModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
       }
        // vérifer si l'utlisateur existe déjà

        public function verifUser($email){            
            $table = 'user';
            return $this->db->select('email')
                        ->from($table)
                        ->where('email',$email)
                        ->get()
                        ->result();
        }
      //récupération des users 
      public function getusers()
      {
          $query= $this->db->query("select * from `user`");
        //  $query = $this->db->get_where('user',array(''=>"");
         // if($query->num_rows() >0){
              return $query->result();
        //  }
      }


      function get_users_by_ids($ids){

        $this->db->where_in("user_id",$ids);
        $query = $this->db->get("user");
        return $query->result_array();
      }

       
      /*function get_users_in_historique($ids){

        $this->db->where_in("user_id", $ids);
        $query = $this->db->get("historique");
        return $query->result_array();
      } */

       public function delete($ids)    
            {

               /* $user_in_historique = $this->get_users_in_historique($ids);
                if(count($user_in_historique) > 0){
                    return false;
                }else{
                    $date = date("d/m/Y");
                    $date = explode("/",$date);
                    $date = time($date);
    
                    $u = $this->get_users_by_ids($ids);
    
                    $desc_activite = "supprimé un ou plusieurs utilisateurs: ";
    
                    foreach ($u as $key) {
    
                        $desc_activite .= $key["username"] . " " . $key["usersurname"] . ", ";
                    }
    
                    $data_activite = array( 
                
                        'user_id' => $this->session->userdata("user_id"),
                        'date_activite' => date("d/m/Y H:i"),
                        'type_activite' => "suppression",
                        'date_activite_stamp' => $date,
                        'desc_activite' => $desc_activite
                    );
    
                    $this->db->insert('activites', $data_activite); */
    
                    $this->db->set('statut', 'supprimé');
                    $this->db->or_where_in('user_id', $ids);
                    return $this->db->update('user');
                }
                
         //   }
       // }
       
          //Ajout d'un utilisateur
          public function addUser($data)
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
            return  $this->db->insert('user', $data);
          }
     // récupération d'un utilisateur
      public function getSinglePost($id)
      {
          $query = $this->db->get_where('user', array('user_id' => $id));
          if($query->num_rows() >0){
              return $query->row();
          }
      }

      // récupération d'un utilisateur
      public function getSingle($id)
      {
          $query = $this->db->get_where('user', array('user_id' => $id));
          if($query->num_rows() >0){
              return $query->row_array();
          }
      }

        //récupération de l'id d'un utilisateur à partir de son mail
        public function getSingle_by_mail($mail)
        {
               $this->db->select('user_id');
               $query = $this->db->get_where('user', array('email' => $mail));
            if($query->num_rows() >0){
                return $query->row();
            }
        }

      public function get_user_as_array($id){
        $query = $this->db->get_where('user', array('user_id' => $id));
        return $query->row_array();

      }

      /*public function get_user_activites($id){

        $query = $this->db->get_where('activites', array('user_id' => $id));
        return $query->result_array();

      } */
        //Modification d'un user
        public function ModiferUser($data,$userId)
        {
            /*$date = date("d/m/Y");
            $date = explode("/",$date);
            $date = time($date);
            $u = $this->get_user_as_array($userId);

            if($userId == $this->session->userdata("user_id")){
              
              $this->session->set_userdata('useremail',$u["useremail"]);
              $this->session->set_userdata('user_id', $userId);
              $this->session->set_userdata('usersurname',$u['usersurname']);
              $this->session->set_userdata('username',$u['username']);
              $this->session->set_userdata('userright',$u['userright']);
            }
            $entreprise_id = $this->session->userdata("entreprise_id");

            $data_activite = array( 
        
              'user_id' => $this->session->userdata("user_id"),
              'date_activite' => date("d/m/Y H:i"),
              'type_activite' => "modification",
              'date_activite_stamp' => $date,
              'entreprise_id'=>$entreprise_id,
              'desc_activite' => "modifié l'utilisateur " .  $u["username"] 
            );

            $this->db->insert('activites', $data_activite);
             */
            return $this->db->where('user_id', $userId)
            ->Update('user',$data);
        }
         // Ajout d'un privilège
        /* public function addPrivilege($data)
         {
          $entreprise_id = $this->session->userdata("entreprise_id");
          $date = time();
          $data_activite = array(       
            'user_id' => $this->session->userdata("user_id"),
            'date_activite' => date("d/m/Y H:i"),
            'type_activite' => "Ajout",
            'date_activite_stamp' => $date,
            'entreprise_id'=>$entreprise_id,
            'desc_activite' => "Enregistrement du privilège" . $data["nom_priv"] 
          );

          $this->db->insert('activites', $data_activite);
           return  $this->db->insert('privilege', $data);
         }
          */
        //type d'activité
       /* public function get_type_activité($entreprise_id)
        {
            
            $req = $this->db->query("SELECT id,type_activite FROM activites where entreprise_id = $entreprise_id");
        	return $req->result_array();
        }
*/
       
        public function get_nb_users(){
          $this->db->where("statut", 'Actif');
          $query = $this->db->get("user");
          return count($query->result_array());
        }

    /*       public function add_historique($data){
            return  $this->db->insert('historique', $data);
        }
*/
        public function email_is_unique($str){
          $this->db->where('useremail', $str);
          $query = $this->db->get("user");
          $result = $query->result_array();
          if (count($result) > 0) {
            return FALSE;
          }else{
            return TRUE;
          }
        }

        public function phone_is_unique($str){
          $this->db->where('Num_tel', $str);
          $query = $this->db->get("user");
          $result = $query->result_array();
          if (count($result) > 0) {
            return FALSE;
          }else{
            return TRUE;
          }
        }


        public function modifier_pass($data,$id_user)
        {
            /*$date = date("d/m/Y");
            $date = explode("/",$date);
            $date = time($date);
            $u = $this->get_user_as_array($id_user);
           
            $data_activite = array(         
              'user_id' => $this->session->userdata("user_id"),
              'date_activite' => date("d/m/Y H:i"),
              'type_activite' => "modification",
              'date_activite_stamp' => $date,
              'entreprise_id'=>$entreprise_id,
              'desc_activite' => $u["username"]." a modifié son mot de pass" 
            );
 //$u["username"]; exit();
            $this->db->insert('activites', $data_activite);
*/
            return $this->db->where('user_id',$id_user)
            ->Update('user',$data);
        }
    }


?>