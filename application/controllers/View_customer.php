<?php
class View_customer extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_view_customer');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="O") {
			$data = [
				'title' => "IPH's Internal | View Customer",
				'page'  => "View Customer",
				'customers' => $this->M_view_customer->get_all_customer()
			];

			$this->load->view('backend/view_customer',$data);
		} else {
			redirect('internal_login');
		}
		
	}
}