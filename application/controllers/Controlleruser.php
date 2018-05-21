<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerUser extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('UserModel');
					$this->load->model('PersonnelModel');
					$this->load->model('ColisModel');
					$this->load->library('session');
				} 
		
				public function _remap($method, $params = array())
				{
							  
					if (method_exists($this, $method))
					{ 
						
					if($this->session->userdata("success")){
						return call_user_func_array(array($this, $method), $params);
						}else{
							redirect("welcome");
						}
					  }
					show_404();
				}
			  
			public function index()
			{
				
				$this->load->view('dashboard');
			}
			//load dashboard
			public function dashboard()
			{   
				$data = array();
				$data["colis"]= $this->ColisModel->get_colis_envoye();
				$this->load->view('dashboard',$data);	
			}
		
			//Chargement de la fenêtre d'ajout des utilisateurs
			public function createUser()
			{
				$this->load->view('users/CreateUser');
				  
			}
			  //ajout d'un utilisateur
			public function SaveUser(){
				$data = $this->input->post();
			    $date_create = date("Y-m-d H:i:s");
				$data["date_create"] = $date_create;
				unset($data['sumbmit']);
				unset($data['passwordconf']);
				// recupération de l'email saisie
				//print_r($data); exit();
				$email = $this->input->post('email');
				//appelle à la fonction qui vérifie si l'utilisateur existe dans notre base
				$result = $this->UserModel->verifUser($email);
				//print_r($result); exit();
				// Vérification si l'utilisateur existe dans notre base
				if(!empty($result))
				{
					// si l'utilisateur existe dans notre base on envoie un message signifiant qu'un utilisateur ayant la même
					//addresse mail existe dans notre base
					
					$erreur ="Cet utilisateur existe déjà";
					$this->session->set_flashdata("msg_erreur","msg_erreur");
				
				   return redirect('users');
					//$this->load->view('users/ListUser',['erreur'=>$erreur]);
				  
				}
					else
				{
				
				//$user_create = $this->session->userdata('username')." ".$this->session->userdata('usersurname');
				$statut ="Actif";
				//$data['user_photo']=$user_photo;
				$data['statut']= $statut;
				//$data['user_create']= $user_create;
				//password_hash($password, PASSWORD_DEFAULT)
			   $password = $this->input->post('password');
			   $mpc = md5($password);
			   $data['password']= $mpc;
				$this->UserModel->addUser($data);
				return redirect('users');
							   
			}
		}
			
			//Lister les utilisateurs
			public function listUser(){
					// les Variables de datatable
					   //
					   $draw = intval($this->input->post("draw"));
					   //
					   $entreprise_id = $this->session->userdata("entreprise_id");
					  // echo $entreprise_id; exit();
					   $start = intval($this->input->post("start"));
					   $length = intval($this->input->post("length"));
					 $user = $this->UserModel->getusers();
		
					 $data = array();
					 if(count($user)>0)
					 {
					 foreach( $user as $r){	
		
											 if($r->statut =="Actif")
											 {
												$tab = array();
												$tab[] = $r->user_id;
												$tab[] = '<td></td>';
												$tab[] =$r->nom;
												$tab[] =$r->prenom;
												$tab[] =$r->email;
												$data[] = $tab;
											 }
										}
		
										}	
					
										$output = array(
											"draw" => $draw,
												"recordsTotal" => count($user),
												"recordsFiltered" => count($user),
												"data" => $data
											);
										
										echo json_encode($output);
									
										
									
			}
		
			public function affichageUser(){
			
				$data = array(); 
				$gare = $this->PersonnelModel->get_gare();
				$data["gare"] = $gare;
				$this->load->view('users/listUser',$data);
			}
		
			// Chargement du formulaire de modification
			public function  modifier($userId)
			{
				
				$priv = $this->Privilege_Model->getpriv();
				$user = $this->UserModel->getSinglePost($userId);
				$this->load->view('users/UpdateUser',['user'=>$user,'privilege'=>$priv]);
				
				
			}
			 // Modification d'un utilisateur
			public function UpdateUser($UserId)
			{
				$this->form_validation->set_rules('username', "Nom", 'trim|required', array("required" => "Veuillez renseigner le nom de l'utilisateur."));
				$this->form_validation->set_rules('usersurname', "Prénom", 'trim|required', array("required" => "Veuillez renseigner le prénom de l'utilisateur."));
				$email = $this->input->post('useremail');
				$former_email = $this->input->post('former_email');
				if ($email != $former_email) {
					
					$this->form_validation->set_rules('useremail', "Email", 'callback_email_check', array("email_check" => "L'email que vous avez renseigner existe déjà."));
				}
		
				$num_tel = $this->input->post('Num_tel');
				$former_num_tel = $this->input->post('former_Num_tel');
				if ($num_tel != $former_num_tel) {
					echo "ok";
					exit();
					$this->form_validation->set_rules('Num_tel', "Numéro", 'callback_phone_check', array("phone_checkk" => "Le numéro que vous avez renseigner existe déjà."));
				}
		
				// $this->form_validation->set_error_delimiters('<p>', '</p>');
		
				if($this->form_validation->run() === FALSE) {
		
					 
					  $this->session->set_flashdata('status', 'error');
					  $priv = $this->Privilege_Model->getpriv();
					$user = $this->UserModel->getSinglePost($UserId);
					$this->load->view('users/UpdateUser',['user'=>$user,'privilege'=>$priv]);		
		
				}else {
				
					$user = $this->UserModel->getSinglePost($UserId);
				//	echo $UserId;
				//	exit();
					 $data = $this->input->post();
					// $date = date('Y-m-d');
					 
					//$data['date_ajout']= $date;
		
					 unset($data['sumbmit']);
					 unset($data['former_email']);
					 unset($data['former_Num_tel']);
					 unset($data['former_img']); 
					 unset($data['user_page']);
					 unset($data['hide']);
					 $config['allowed_types'] = 'jpg|png';
					$config['upload_path'] = './uploads/users';
					$this->load->library('upload', $config);
		
					if($_FILES["user_photo"]["name"]){
		
						if(!$this->upload->do_upload('user_photo')) {
							$erreur ="photo invalide";
							$this->session->set_flashdata('status', 'error');
							$priv = $this->UserModel->getpriv();
							$this->load->view('users/listUser',['privilege'=>$priv]);
							//$this->load->view('users/UpdateUser',['erreur'=>$erreur,'user'=>$user]);
						}else{
							$user_photo;
							if($this->upload->data('file_name')){
							  $user_photo = $this->upload->data('file_name');
							}else{
							  $user_photo = "";
							}
		
						if ($this->input->post("former_img")) {
							unlink("./uploads/users/" . $this->input->post("former_img"));	
						}	
		
						
						if(! $this->upload->do_upload('user_photo')) {
							$this->session->set_flashdata('status', 'error');
							$this->load->view('users/UpdateUse', $article);
						}else{
		
							$data['user_photo']=$user_photo;
		
							if($this->UserModel->ModiferUser($data,$UserId)) {
								$this->session->set_flashdata('$msg','Enregistrement effectué avec succès');
								$priv = $this->UserModel->getpriv();
								$this->load->view('users/listUser',['privilege'=>$priv]);
								//return redirect('utilisateurs/profile/'. $UserId);
							}
						}
		
					}
					
				}  else{
						if($this->UserModel->ModiferUser($data,$UserId)) {
							$this->session->set_flashdata('$msg','Enregistrement effectué avec succès');
							$priv = $this->Privilege_Model->getpriv();
							$this->load->view('users/listUser',['privilege'=>$priv]);
							//return redirect('utilisateurs/profile/'. $UserId);
						}
		
		
					}
				}     
		
				
			}
			
			// Suppression d'un user
			public function SupUser(){
		
				 $user = $this->input->post('selected');
				  if($user!="")
		
				if($this->UserModel->delete($user)){
				  $data["error"] = "";
				  echo json_encode($data);
		
				}else{
				  $data["error"] = "An error occured";
				  echo json_encode($data);
		
				}
			}
		
			//Chargement de la page de modificatio de mot de passe
		
			public function load_change_pass()
			{
				$this->load->view("users/change_pass");
			}
		
			//modification du mot de passe
			public function change_pass($id)
			{
				$mdp = md5($this->input->post('pass'));
				$data['password']= $mdp; 
				$user = $this->UserModel->getSingle($id);
				// print_r($user); exit();
				if($this->UserModel->ModiferUser($data,$id)) {
				
				
				}
				}	
		
			public function show_user_page($id)
			{
				$data = $this->UserModel->get_user_as_array($id);
				$data["activites"] = $this->UserModel->get_user_activites($id);
				$data["historiques"] = $this->connexion->get_user_historiques($id);
				$data["nb_connexions"] = count($data["historiques"]);
				$data["nb_activites"] = count($data["activites"]);
				$this->load->view("users/user_page", $data);
			}
		
				
			 public function email_check($str)
			{
				return $this->UserModel->email_is_unique($str);
			}
		
			 public function phone_check($str)
			{
				return $this->UserModel->phone_is_unique($str);
			}
			
			public function modifier_pass()
			{
				$pass =  md5($this->input->post("new_pass"));
				$user_id = $this->input->post("id_user");
				$data['password']= $pass; 
				$user = $this->UserModel->getSingle($pass);
				// print_r($user); exit();
				if($this->UserModel->modifier_pass($data,$user_id)){
					$data["error"] = "";
					echo json_encode($data);		
				}else{
					$data["error"] = "erreur de modification";
					echo json_encode($data);
				}
				
			}
		
	

	
}
