<?php 
class Internal_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('M_ilogin');
	}

	public function index(){
		if($this->session->userdata('log_stts')===TRUE && ($this->session->userdata('iu_level')==='A' || $this->session->userdata('iu_level')==='O')){
			redirect('dashboard');
		}else{
			$this->load->view('backend/internal_login');
		}
	}

	public function authentication(){
		if($this->session->userdata('log_stts')===TRUE && ($this->session->userdata('iu_level')==='A' || $this->session->userdata('iu_level')==='O')){
			redirect('dashboard');
		}else{
			if (isset($_POST['username']) && isset($_POST['password'])) {
				$validation = $this->M_ilogin->validating_user($_POST['username'],md5($_POST['password']));
				if ($validation) {
					if ($validation->iu_job_stts !== '1') {
						$this->session->set_flashdata('login','not_permitted');
						redirect('internal_login');
					}else{
						$validation_attr = [
							'iu_id' => $validation->iu_id,
							'iu_level' => $validation->iu_level,
							'iu_firstname' => $validation->iu_firstname,
							'iu_lastname' => $validation->iu_lastname,
							'log_stts' => TRUE
						];
						$this->session->set_userdata($validation_attr);
						redirect('dashboard');
					}
					
				}else{
					$this->session->set_flashdata('login','failed');
					redirect('internal_login');
				}
			} else{
				redirect('internal_login');
			}
		}
	}
}