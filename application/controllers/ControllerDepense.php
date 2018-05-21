<?php

		defined('BASEPATH') OR exit('No direct script access allowed');
		
		class ControllerDepense extends CI_Controller {
		  
			function __construct() {
					parent::__construct();
					$this->load->model('DepenseModel');
					
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

			   public function load_depense()
			   {
				   $this->load->view('depense/new_depense');
			   }



				public function list_depense_json()
							{
								$table  = 'depense';

							$primaryKey = 'depense`.`id_depense';

							$columns = array(
								array(
									'db' => 'depense`.`id_depense', 
									'field'=>'id_depense',
									'dt' => 'id_depense'
									),
								array(
									'db' => 'depense`.`id_depense', 
									'field'=>'id_depense',
									'dt' => 'DT_RowId',
									'formatter' => function($d, $row) {
										return 'row_'.$d;
									}
								),
								array(
									'db' => 'depense`.`id_depense',
									'field'=>'id_depense',
									'dt' => 'checkbox',
									'formatter' => function($d, $row) {
										return "";
									}
								),
								array('db' => 'nom_beneficiaire', 'dt' => 'nom_beneficiaire'),		
								array('db' => 'motif',	'dt' => 'motif'),
								array('db' => 'montant', 'dt' => 'montant'),
								array('db' => 'type_payement', 'dt' => 'type_payement'),
								array('db' => 'date', 'dt' => 'date')
							);
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

			}
