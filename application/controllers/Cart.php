<?php
class Cart extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_frontend');
	}
	public function index(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$data = [
				'title' => "Indonesia Publishing House (IPH) | Cart",
				'page'  => "FEATURES ITEM",
				'cart' => $this->M_frontend->get_cart(),
				'amount' => $this->M_frontend->get_cart_amount()
			];
			$this->load->view('frontend/cart',$data);
		}else{
			redirect(base_url());
		}
		
	}

	public function remove_item(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$this->M_frontend->remove_item_from_cart($_POST['it_code']);
			echo json_encode(array("status" => TRUE));
		}else{
			redirect(base_url());
		}
	}

	public function test($a="345"){
		redirect('cart/abcd?order='.$a);
	}
}