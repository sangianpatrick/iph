<?php
class Customer extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_frontend');
		$this->load->helper('security');
	}
	public function index(){
		if($this->session->userdata('c_log_stts')===TRUE){
			redirect(base_url());
		}else{
			$data = [
				'title' => "Indonesia Publishing House (IPH) | Login and Registration",
				'page'  => "Login and Registration"
			];
			$this->load->view('frontend/login_register',$data);
		}
	}

	public function registration_process(){
		if($this->session->userdata('c_log_stts')===TRUE){
			redirect(base_url());
		}else{
			$reg_data = [
				'cd_fullname' => $_POST['fullname'],
				'cd_email' => $_POST['email_address'],
				'cd_phone' => $_POST['phone_number'],
				'cd_address' => $_POST['address'],
				'cd_postal_code' => $_POST['postal_code'],
				'cd_password' => do_hash($_POST['password'],'md5')
			];

			$this->M_frontend->registration($reg_data);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function login_process(){
		if($this->session->userdata('c_log_stts')===TRUE){
			redirect(base_url());
		} else{
			$validation = $this->M_frontend->validating_user($_POST['login_email'],md5($_POST['login_password']));
			if ($validation) {
				$validation_attr = [
					'cd_id' => $validation->cd_id,
					'cd_fullname' => $validation->cd_fullname,
					'cd_email' => $validation->cd_email,
					'c_log_stts' => TRUE
				];
				$this->session->set_userdata($validation_attr);
				echo json_encode(array("c_log_stts" => '1'));
			}else{
				echo json_encode(array("c_log_stts" => '0'));
			}
		}
	}

	public function logout(){
		if($this->session->userdata('c_log_stts')===TRUE){
			unset(
			        $_SESSION['cd_id'],
			        $_SESSION['cd_fullname'],
			        $_SESSION['cd_email'],
			        $_SESSION['c_log_stts']
			);
			redirect(base_url());
		} else{
			redirect(base_url());
		}
	}
}