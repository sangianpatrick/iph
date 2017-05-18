<?php
class Manage_operator extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_manage_operator');
		$this->load->helper('security');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$data = [
				'title' => "IPH's Internal | Manage Operator",
				'page'  => "Manage Operator",
				'operator' => $this->M_manage_operator->get_all_operator()
			];

			$this->load->view('backend/manage_operator',$data);
		} else {
			redirect('internal_login');
		}
		
	}

	public function save_created_data(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$username = date('ymd').rand(100,999);
			$data_one = [
				'iu_username' => $username,
				'iu_password' => do_hash('password','md5'),
				'iu_level' => 'O',
			];
			$data_two = [
				'iu_emp_num' => $username,
				'iu_firstname' => $_POST['op_firstname'],
				'iu_lastname' => $_POST['op_lastname'],
				'iu_gender' => $_POST['op_gender'],
				'iu_dob' => $_POST['op_dob'],
				'iu_pob' => $_POST['op_pob'],
				'iu_phone' => $_POST['op_phone'],
				'iu_address' => $_POST['op_address']
			];

			$this->M_manage_operator->save_data($data_one,'internal_user');
			$this->M_manage_operator->save_data($data_two,'iu_detail');
			$this->session->set_flashdata('operator', 'success_add');
			redirect('manage_operator');
		} else {
			redirect('internal_login');
		}
	}

	public function save_updated_data(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$updated_data2 = [
				'iu_firstname' => $_POST['op_firstname'],
				'iu_lastname' => $_POST['op_lastname'],
				'iu_gender' => $_POST['op_gender'],
				'iu_dob' => $_POST['op_dob'],
				'iu_pob' => $_POST['op_pob'],
				'iu_phone' => $_POST['op_phone'],
				'iu_address' => $_POST['op_address']
			];
			$this->M_manage_operator->update_data($updated_data2,$_GET['emp'],'iu_detail','iu_detail_id');
			$this->session->set_flashdata('operator', 'success_up');
			redirect('manage_operator');
		} else {
			redirect('internal_login');
		}
	}

	public function reset_operator_password(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$password_reset = [
				'iu_password' => do_hash('password','md5')
			];
			$this->M_manage_operator->update_data($password_reset,$_GET['emp'],'internal_user','iu_id');
			$this->session->set_flashdata('operator', 'success_chg');
			redirect('manage_operator');
		} else {
			redirect('internal_login');
		}
	}

	public function remove_operator(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$password_reset = [
				'iu_job_stts' => '0'
			];
			$this->M_manage_operator->update_data($password_reset,$_GET['emp'],'iu_detail','iu_detail_id');
			$this->session->set_flashdata('operator', 'success_rm');
			redirect('manage_operator');
		} else {
			redirect('internal_login');
		}
	}
}