<?php
class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_frontend');
	}
	public function index(){
		$data = [
			'title' => "Indonesia Publishing House (IPH) | Shop",
			'page'  => "FEATURES ITEM",
			'products' => $this->M_frontend->get_all_product()
		];
		$this->load->view('frontend/main',$data);
	}

	public function add_to_cart(){
		$data = [
			'item_code' => $_POST['it_code'],
			'cart_date' => date('Y-m-d'),
			'cd_id'		=> $_SESSION['cd_id']
		];
		$this->M_frontend->add_to_cart('cart',$data);
		echo json_encode(array("status" => TRUE));
	}
}