<?php 
    class DepenseModel extends CI_model 
    {
        function __construct() 
        { 
            parent::__construct(); 
           
	   }


	   public function add_depense($data)
	   {
		  return  $this->db->insert('depense',$data);
	   }

	   public function get_depense_jour($date)
	   {
		$query = $this->db->query("SELECT SUM(montant) as val from depense where depense.date = '$date' ");
		$result = $query->row();
		return $result->val;
	   }

	   public function get_depense_between($date1,$date2)
	   {
		$query = $this->db->query("SELECT SUM(montant) as val from depense where depense.date BETWEEN '$date1' AND '$date2' ");
		$result = $query->row();
		return $result->val;
	   }
	   
	}
