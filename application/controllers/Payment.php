<?php
class Payment extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_manage_payment');
		$this->load->model('M_manage_stock');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="O") {
			$data = [
				'title' => "IPH's Internal | List of Payment",
				'page'  => "List of Payment",
				'payment' => $this->M_manage_payment->get_all_payment()
			];

			$this->load->view('backend/payment',$data);
		} else {
			redirect('internal_login');
		}
		
	}

	public function get_payment_detail(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="O") {
			$jsondata['payment'] = $this->M_manage_payment->get_order_detail($_POST['it_code']);
			$jsondata['cart'] = $this->M_manage_payment->get_cart($_POST['it_code']);
			$jsondata['amount'] = $this->M_manage_payment->get_order_amount($_POST['it_code']);

			echo json_encode($jsondata);
		} else {
			redirect('internal_login');
		}
		
	}

	public function confirm(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="O") {
			if (isset($_POST['order_code'])) {
				$items = $this->M_manage_payment->get_cart($_POST['order_code']);
				foreach ($items as $item) {
					$sql  = "UPDATE item_stock SET item_qty=item_qty-".(int)$item->quantity." WHERE item_code='".$item->item_code."'";
					$sql2  = "UPDATE payment SET confirm_by=".$_SESSION['iu_id']." WHERE order_code='".$_POST['order_code']."'";
					$activity = [
                        'activity_date' => date('Y-m-d H:i:s'),
                        'activity_type' => "O",
                        'activity_desc' => $item->quantity." item(s) with code ".$item->item_code." has purchased on ".$_POST['order_code'],
                        'activity_by' => $this->session->userdata('iu_id')
                       ];
					$this->M_manage_stock->restock($sql);
					$this->M_manage_stock->restock($sql2);
					$this->M_manage_stock->save_item($activity,'stock_activity');
					$this->session->set_flashdata('confirm','success');
					$this->session->set_flashdata('succ_m',"You have confirmed the payment with order code <strong>".$_POST['order_code']."</strong>");
				}
				echo json_encode(array('status' => "Ok" ));
			}else{
				echo "Sorry,the page that you requested was not found.<br><a type='button' href='".base_url('dashboard')."'>Back to home</a>";
			}
		} else {
			redirect('internal_login');
		}
	}
}