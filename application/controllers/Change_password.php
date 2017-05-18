<?php
class Change_password extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_ilogin');
		$this->load->model('M_manage_stock');
		$this->load->helper('security');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && ($this->session->userdata('iu_level')==="A" || $this->session->userdata('iu_level')==="O")) {
			$validation = $this->M_ilogin->password_checking($_SESSION['iu_id'],md5($_POST['c_pass']));
			if ($validation) {
				//$sql  = "UPDATE internal_user SET iu_password=".do_hash($_POST['c_new_pass'],'md5')." WHERE iu_id='".$_SESSION['iu_id']."'";
				$newpass = array("iu_password" => do_hash($_POST['c_new_pass'],'md5'));
				$this->M_manage_stock->update_item($newpass,'internal_user',$_SESSION['iu_id'],'iu_id');
				echo json_encode(array('chgpass' => 1));
			}else{
				echo json_encode(array('chgpass' => 0));
			}
		} else {
			redirect('internal_login');
		}
		
	}
}