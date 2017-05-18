<?php 
class M_manage_operator extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_all_operator(){
		$return = array();
		$this->db->select("internal_user.iu_id,iu_emp_num,iu_username,iu_firstname,iu_lastname,iu_gender,iu_pob,iu_dob,iu_phone,iu_address,iu_detail_id");
		$this->db->from("iu_detail");
		$this->db->join('internal_user', 'internal_user.iu_id = iu_detail.iu_detail_id');
		$this->db->where('iu_level','O');
		$this->db->where('iu_job_stts','1');

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function save_data($data,$tbl){
		$this->db->insert($tbl, $data);
	}

	public function update_data($updated_data,$emp_num,$tbl,$col){
		$this->db->where($col, $emp_num); 
		$this->db->update($tbl, $updated_data); 
	}
}