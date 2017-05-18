<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		//$this->load->model('M_dashboard');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && ($this->session->userdata('iu_level')==="A" || $this->session->userdata('iu_level')==="O")) {
			$data = [
				'title' => "IPH's Internal | Dashboard",
				'page'  => "Dashboard"
			];

			$this->load->view('backend/dashboard',$data);
		} else {
			redirect('internal_login');
		}
		
	}
}