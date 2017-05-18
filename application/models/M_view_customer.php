<?php 
class M_view_customer extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_all_customer(){
		$return = array();
		$this->db->select("*");
		$this->db->from("customer_detail");

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}
}