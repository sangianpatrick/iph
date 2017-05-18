<?php 
class M_manage_stock extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_all_item(){
		$return = array();
		$this->db->select("*");
		$this->db->from("item_stock");
		$this->db->join('book', 'book.book_id = item_stock.item_id');

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function save_item($data,$tbl){
		$this->db->insert($tbl, $data);
	}

	public function update_item($updated_data,$tbl,$id,$col){
		$this->db->where($col, $id); 
		$this->db->update($tbl, $updated_data); 
	}

	public function restock($query){
		$this->db->query($query);
	}
}