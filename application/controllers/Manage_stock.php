<?php
class Manage_stock extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('M_manage_stock');
	}

	public function index(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$data = [
				'title' => "IPH's Internal | Manage Stock",
				'page'  => "Manage Stock",
				'stock' => $this->M_manage_stock->get_all_item()
			];

			$this->load->view('backend/manage_stock',$data);
		} else {
			redirect('internal_login');
		}
	}

	public function get_code($length = 5) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
	    return $randomString;
	}

	public function save_new_item(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$isbn = (empty($_POST['it_isbn'])?null:$_POST['it_isbn']);
			$imgname = mt_rand();
			$config['upload_path']          = './uploads/';
                  $config['allowed_types']        = 'gif|jpg|png';
                  $config['file_name']			= $imgname.'.jpg';
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config);

                        if ($this->upload->do_upload('it_img')) {
                        	$code = $this->get_code();
                        	$item_data = [
                        		'item_code' => $code,
                        		'item_qty'  => (int)$_POST['it_quantity'],
                        		'item_price'=> (int)$_POST['it_price']
                        	];
                        	$book_data = [
                        		'book_title' => $_POST['it_title'],
                        		'book_author' => $_POST['it_author'],
                        		'book_publisher' => $_POST['it_publisher'],
                        		'book_author' => $_POST['it_author'],
                        		'book_cat' => $_POST['it_catagory'],
                        		'book_isbn' => $isbn,
                        		'book_img' => $imgname
                        	];
                        	$activity = [
                        		'activity_date' => date('Y-m-d H:i:s'),
                        		'activity_type' => "I",
                        		'activity_desc' => $_POST['it_quantity']." new ". "incomimg item with code ".$code,
                        		'activity_by' => $this->session->userdata('iu_id')
                        	];

                        	$this->M_manage_stock->save_item($item_data,'item_stock');
                        	$this->M_manage_stock->save_item($book_data,'book');
                        	$this->M_manage_stock->save_item($activity,'stock_activity');
                        	$this->session->set_flashdata('item', 'success_add');
                        	redirect('manage_stock');
                        } else{
                        	$error = $this->upload->display_errors();
                              $this->session->set_flashdata('item', 'cancel_add');
                              $this->session->set_flashdata('messages', $error);
                              redirect('manage_stock');
                        }
		} else {
			redirect('internal_login');
		}
	}

	public function restock_item() {
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
				$code = $_POST['ex_title'];
				$qty  = $_POST['ex_qty'];
				$sql  = "UPDATE item_stock SET item_qty=item_qty+".(int)$qty." WHERE item_code='".$code."'";
				$this->M_manage_stock->restock($sql);
				redirect('manage_stock');
		} else {
			redirect('internal_login');
		}
	}

	public function update_existing_item(){
		if ($this->session->userdata('log_stts')===TRUE && $this->session->userdata('iu_level')==="A") {
			$isbn = (empty($_POST['it_isbn'])?null:$_POST['it_isbn']);
			$imgname = mt_rand();
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']			= $imgname.'.jpg';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('it_img')) {
            	$item_data = [
            		'item_price'=> (int)$_POST['it_price']
            	];
            	$book_data = [
            		'book_title' => $_POST['it_title'],
            		'book_author' => $_POST['it_author'],
            		'book_publisher' => $_POST['it_publisher'],
            		'book_author' => $_POST['it_author'],
            		'book_cat' => $_POST['it_catagory'],
            		'book_isbn' => $isbn,
            		'book_img' => $imgname
            	];

            	$this->M_manage_stock->update_item($item_data,'item_stock',$_GET['itm'],'item_id');
            	$this->M_manage_stock->update_item($book_data,'book',$_GET['itm'],'book_id');
            	$this->session->set_flashdata('item', 'success_up');
            	redirect('manage_stock');
            } else{
            	$item_data = [
            		'item_price'=> (int)$_POST['it_price']
            	];
            	$book_data = [
            		'book_title' => $_POST['it_title'],
            		'book_author' => $_POST['it_author'],
            		'book_publisher' => $_POST['it_publisher'],
            		'book_author' => $_POST['it_author'],
            		'book_cat' => $_POST['it_catagory'],
            		'book_isbn' => $isbn
            	];

            	$this->M_manage_stock->update_item($item_data,'item_stock',$_GET['itm'],'item_id');
            	$this->M_manage_stock->update_item($book_data,'book',$_GET['itm'],'book_id');
            	$this->session->set_flashdata('item', 'success_up');
            	redirect('manage_stock');
            }
		} else {
			redirect('internal_login');
		}
	}
}