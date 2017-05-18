<?php
class Checkout extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_frontend');
	}
	public function index(){
		if($this->session->userdata('c_log_stts')===TRUE){
			if (isset($_GET['order'])) {
				$checking = $this->M_frontend->check_order($_GET['order']);
				if ($checking) {
					$data = [
						'title' => "Indonesia Publishing House (IPH) | Checkout",
						'items' => $this->M_frontend->get_items($_GET['order']),
						'amount' => $this->M_frontend->get_item_amount($_GET['order']),
						'code' => $_GET['order']
					];

					$this->load->view('frontend/checkout',$data);
				}else{
					echo "Sorry, the order code was not exist.<br><a type='button' href='".base_url()."'>Back to home</a>";
				}
			}else{
				echo "Sorry,the page that you requested was not found.<br><a type='button' href='".base_url()."'>Back to home</a>";
			}
			
			//$this->load->view('frontend/cart',$data);
			//echo $_GET['order'];
		}else{
			redirect(base_url());
		}
		
	}

	private function _generate_order_code($length = 3) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString1 = '';
	    $randomString2 = '';
	    $randomString3 = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString1 .= $characters[rand(0, $charactersLength - 1)];
		    }
		    for ($i = 0; $i < $length; $i++) {
		        $randomString2 .= $characters[rand(0, $charactersLength - 1)];
		    }
		    for ($i = 0; $i < $length; $i++) {
		        $randomString3 .= $characters[rand(0, $charactersLength - 1)];
		    }
		$order_code = $randomString1."-".$randomString2."-".$randomString3;
	    return $order_code;
	}

	public function add_to_checkout(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$code = $this->_generate_order_code();
			$this->M_frontend->create_order('order',array('cd_id' => $_SESSION['cd_id'],'order_code' => $code, 'order_date' => date('Y-m-d')));
			$this->M_frontend->add_order_to_cart(array('order_code' => $code),$_SESSION['cd_id'],'cart','cd_id');
			echo json_encode(array('code' => $_GET['status']));
			//echo json_encode(array("status" => TRUE));
			
			redirect('checkout?order='.$code);
		}else{
			redirect(base_url());
		}
	}

	public function confirm_payment(){
		if($this->session->userdata('c_log_stts')===TRUE){
			$validation = $this->M_frontend->validating_user($_SESSION['cd_email'],md5($_POST['pass']));
			if ($validation) {
				$imgname = mt_rand();
				$confirmation_data = [
					'payment_date' => date('Y-m-d'),
					'bank' => $_POST['bank'],
					'bank_acc_num' => $_POST['acc_num'],
					'bank_acc_name' => $_POST['acc_name'],
					'order_code' => $_GET['order'],
					'payment_receipt' => $imgname.'.jpg'
				];
				$config['upload_path']          = './uploads/payment/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']			= $imgname.'.jpg';
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('receipt')) {
                	$pay_status = ['payment_status' => '1'];
					$c = $_GET['order'];
                	$this->M_frontend->payment_status($pay_status,$c);
					$this->M_frontend->payment_conf('payment',$confirmation_data);
                	echo 1;
					//$status = 1;
					//echo $status;
                }else{
                	$status = 2;
                	echo $status;
                }
				
			}else{
				$status = 0;
				echo $status;
			}
		}else{
			redirect(base_url());
		}
		//echo json_encode(array('pass' => $_POST['pass'],'code' => $_GET['order']));
	}

	public function test(){
		if (isset($_FILES['receipt'])) {
			echo $a = 1+2;
			//echo json_encode(array('status'=>$a));
		}else{
			echo json_encode(array("status" => "no"));
		}
	}

	function testupdate($c = "asdf"){
		$pay_status = [
					'payment_statu' => 1
				];
		$this->M_frontend->payment_status($pay_status,$c);
	}
}