<?php
class Connexion extends CI_Model {
    
     function __construct(){
         $this->load->database();
         $this->load->library('session');
        
     }
    
    function validCredentials($useremail,$password){
     //$this->load->library('encrypt');

     $q = "SELECT user.user_id,nom,prenom,email,user.droit,`user`.`statut`,`user`.`id_gare`,`gare`.`id_gare`,lib_gare,`gare`.`ville`  FROM user,gare WHERE `user`.`id_gare`=`gare`.`id_gare` AND email = ? AND password = ?  AND `user`.`statut` = 'Actif' ";

     $data = array($useremail,$password);
    
	 $q = $this->db->query($q,$data);
	 
	 $q2 = "SELECT user.user_id,nom,prenom,email,user.droit,`user`.`statut`,`user`.`id_gare` FROM user,gare WHERE `user`.`id_gare`=0 AND email = ? AND password = ?  AND `user`.`statut` = 'Actif' ";
         
	 $q2 = $this->db->query($q2,$data);

     if($q->num_rows() > 0) {
		  $r = $q->result_array();
		  $r['type_user']="normal";
          return $r;         
     }elseif($q2->num_rows() > 0){
		$r = $q2->result_array();
		$r['type_user']="superviseur";
		return $r; 
	 }else{
		 return false;
	 }
        
  
}
      public function historique($data)
    
    {   
       
    $data_activite = array( 
        
        'user_id' => $this->session->userdata("user_id"),
        'date_activite' => date("d/m/Y H:i"),
        'type_activite' => "connexion",
        'desc_activite' =>"connexion à l'application."

    );
    $this->db->insert('activites', $data_activite);
       
    }
    public function get_user_historiques($id){
      $query = $this->db->get_where('historique', array('user_id' => $id));
      return $query->result_array();
    }
    
   public function update_historique($id)
        
    {
        $entreprise_id = $this->session->userdata("entreprise_id");
        $date_stamp = date("d/m/Y");
		$date_explode = explode("/",$date);
        $date_stamp = time($date_explode);
            
        $u = $this->get_user_by_id($this->session->userdata("user_id"));
        
        $date = date("d/m/Y H:i:s");
        $data = array(
        'date_deconnexion' => $date,
         );
         

        $data_activite = array( 
        
            'user_id' => $this->session->userdata("user_id"),
            'date_activite' => date("d/m/Y H:i"),
            'type_activite' => "Déconnexion",
            'entreprise_id' => $entreprise_id,
            'date_activite_stamp' => $date_stamp,
            'desc_activite' => " Déconnexion "

        );

        $this->db->insert('activites', $data_activite);
        $this->db->where('id', $id);
        $this->db->update('historique', $data);   
        
    }

    public function email_exists($useremail){
        
        $sql = "SELECT nom, prenom FROM user WHERE email= '{$useremail}' LIMIT 1";
        $result =  $this->db->query($sql);
        $row = $result->row();
        
        return($result->num_rows() === 1 && $row->useremail) ? $row->nom : false;
    }
    
    public function verify_reset_password_code($useremail,$password){
        $sql = "SELECT nom,prenom FROM user WHERE email = '{$useremail}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        
        if($result->num_rows() === 1 ){
            return ($password == md5($row->username)) ? true : false;
        }
        else {
            return false;
        }
    }


    public function get_user_by_emeil($email){

        $query =  $this->db->get_where("user", array("email" => $email));
        return $query->row_array();
    }

    public function get_user_by_id($id){

        $query =  $this->db->get_where("user", array("user_id" => $id));
        return $query->row_array();
    }



    public function update_password() {
        $entreprise_id = $this->session->userdata("entreprise_id");
        $date = date("d/m/Y");
		$date_explode = explode("/",$date);
		$date = time($date_explode);

        $u = $this->get_user_by_emeil($this->input->post('useremail'));

        $desc_activite = $u["username"] . " a modifié son mot de passe";

        $data_activite = array( 
    
            'user_id' => $u["user_id"],
            'date_activite' => date("d/m/Y H:i"),
            'type_activite' => "modification",
            'entreprise_id' =>$entreprise_id,
            'date_activite_stamp' => $date,
            'desc_activite' => $desc_activite
        );
        $this->db->insert('activites', $data_activite);

        $useremail = $this->input->post('useremail');
        $password = md5($this->input->post('password'));
        $this->db->where("useremail", $useremail);
        return $this->db->update('user', array("password" => $password));
       
    }


    // récupération d'une historique
    public function getSinglePost($id)
    {
        $query = $this->db->get_where('historique', array('user_id' => $id));
        if($query->num_rows() >0){
            return $query->row_array();
        }
    }

    public function delete_historique($user_id)
    {
        $this->db->delete('historique',array('user_id' => $user_id));
    }

    public function super_admin($useremail,$password)
    {
        $q =$this->db->query("SELECT `user`.`user_id`, `user`.`username`,`user`.`useremail`,`user`.`userright` FROM `user` WHERE `user`.`useremail` = '$useremail' AND `user`.`password` = '$password' AND `user`.`statut` ='Actif'");  
        $r = $q->result_array();
         return $r;
    }
       
}
?>
