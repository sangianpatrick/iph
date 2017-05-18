<?php 
class M_ilogin extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function validating_user($username, $password)
	{
		$this->db->select('internal_user.iu_id,iu_username,iu_password,iu_level,iu_firstname,iu_lastname,iu_job_stts');
		$this->db->from('iu_detail');
		$this->db->join('internal_user', 'internal_user.iu_id = iu_detail.iu_detail_id');
		$this->db->where('iu_username', $username);
		$this->db->where('iu_password', $password);
		//$this->db->where('USER_STTS', 1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
		
		return NULL;
	}

	public function password_checking($id, $password)
	{
		$this->db->select('internal_user.iu_id,iu_username,iu_password,iu_level,iu_firstname,iu_lastname,iu_job_stts');
		$this->db->from('iu_detail');
		$this->db->join('internal_user', 'internal_user.iu_id = iu_detail.iu_detail_id');
		$this->db->where('iu_id', $id);
		$this->db->where('iu_password', $password);
		//$this->db->where('USER_STTS', 1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
		
		return NULL;
	}
}