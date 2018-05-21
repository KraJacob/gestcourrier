<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerPassager extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('PassagerModel');
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
              
              public function load_type_passager()
              {
				     echo "ok";
                  $this->load->view("passager/type_passager");
              }

              public function add()
              {
                $data = $this->input->post();
                $statut = "Actif";
                $date_create = date("Y-m-d H:i:s");
                $data['statut'] = $statut;
				$data["date_create"] = $date_create;
                unset($data['sumbmit']);
               if($this->PassagerModel->add_type_passager($data))
               {
                $this->session->set_flashdata("success","success");
                return redirect('type_passager');
               }else{
                $this->session->set_flashdata("echec","echec");
                return redirect('type_passager');
               }
				
              }

        public function list_type_passager()
         {        
			$table  = 'passager`, `depart`,`destination';

			$primaryKey = 'passager`.`id_passager';

			$columns = array(
				array(
					'db' => 'passager`.`id_passager', 
					'field'=>'id_passager',
					'dt' => 'DT_RowId',
					'formatter' => function($d, $row) {
						return 'row_'.$d;
					}
				),
				array(
					'db' => 'passager`.`id_passager',
					'field'=>'id_passager',
				 	'dt' => 'checkbox',
				 	'formatter' => function($d, $row) {
				 		return "";
				 	}
				 ),
				array('db' => 'nom', 'dt' => 'nom'),		
				array('db' => 'prenom',	'dt' => 'prenom'),
				array('db' => 'mobile', 'dt' => 'mobile'),
				array('db' => 'type_passager', 'dt' =>'type_passager'),
				array(
					'db' => 'passager`.`date_create',
					'field' => 'date_create', 
					'dt' => 'date_create'	

				),
				array('db' => 'num_siege', 'dt' =>'num_siege'),
				array('db' => 'ville_arrive', 'dt' =>'ville_arrive'),
				array('db' => 'num_depart', 'dt' =>'num_depart'),
				
				array(
					'db' => 'passager`.`id_depart',
					'field' => 'id_depart',
					'dt' => 'id_depart'
				),
				array(
					'db' => 'passager`.`id_destination',
					'field' => 'id_destination',
					'dt' => 'id_destination'
				)
				
			);
			$whereClause = "`passager`.`id_depart` = `depart`.`id_depart` AND `passager`.`id_destination` = `destination`.`id_destination`";
          	require('ssp.php');
			
			echo json_encode(
				array(
					"draw"            => isset ( $request['draw'] ) ?
						intval( $request['draw'] ) :
						0,
					"recordsTotal"    => intval($totalData ),
					"recordsFiltered" => intval( $totalFiltered ),
					"data"            => $out
				)
			, JSON_UNESCAPED_UNICODE);

			  }
			  
			  public function load_list_passager()
			  {
				  $this->load->view('passager/listPassager');
			  }
              
            }

            ?>
