<?php
class Order_list extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_frontend');
	}
	public function index(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$data = [
				'title' => "Indonesia Publishing House (IPH) | Order List",
				'order' => $this->M_frontend->get_order()
			];
			$this->load->view('frontend/order_list',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function remove_order(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$this->M_frontend->remove_order_from_order($_POST['it_code']);
			$this->M_frontend->remove_order_from_cart($_POST['it_code']);
			echo json_encode(array("status" => TRUE));
		}else{
			redirect(base_url());
		}
	}

	public function test($a="345"){
		redirect('cart/abcd?order='.$a);
	}
}