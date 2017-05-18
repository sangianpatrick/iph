<?php 
class M_frontend extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function registration($reg_data){
		$this->db->insert('customer_detail', $reg_data);
	}

	public function validating_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('customer_detail');
		$this->db->where('cd_email', $username);
		$this->db->where('cd_password', $password);
		//$this->db->where('USER_STTS', 1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
		
		return NULL;
	}

	public function get_all_product(){
		$return = array();
		$this->db->select("*");
		$this->db->from("item_stock");
		$this->db->join('book', 'book.book_id = item_stock.item_id');
		$this->db->where('item_stock.item_qty >',5);
		if (isset($_GET['catagory'])) {
			if($_GET['catagory']=="1"){
				$this->db->where('book.book_cat',"Religy");
			}
			if($_GET['catagory']=="2"){
				$this->db->where('book.book_cat',"Healthy");
			}
		}
		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function add_to_cart($tbl,$data){
		$this->db->insert($tbl, $data);
	}

	public function get_cart(){
		$return = array();
		$this->db->select("book_title,book_img,cart.item_code,item_price, count(cart.item_code) as quantity, (item_price*count(cart.item_code)) as total");
		$this->db->from("cart");
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->join('book', 'book.book_id = item_stock.item_id');
		$this->db->where('cart.order_code',null);
		$this->db->where('cd_id',$_SESSION['cd_id']);
		$this->db->group_by('cart.item_code');
		$this->db->order_by('cart_id','asc');

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function get_cart_amount(){
		$return = array();
		$this->db->select("sum(item_price) as total_amount");
		$this->db->from("cart");
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->where('cd_id',$_SESSION['cd_id']);
		$this->db->where('order_code',null);

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function remove_item_from_cart($code){
		$this->db->delete('cart', array('item_code' => $code,'cd_id' => $_SESSION['cd_id']));
	}

	public function create_order($tbl,$data){
		$this->db->insert($tbl, $data);
	}

	public function add_order_to_cart($updated_data,$cd_id,$tbl,$col){
		$this->db->where($col, $cd_id); 
		$this->db->where('order_code', null);
		$this->db->update($tbl, $updated_data); 
	}

	public function check_order($code){
		$this->db->select('order.order_code');
		$this->db->from('order');
		//$this->db->join('payment','payment.order_code != order.order_code');
		$this->db->where('order.payment_status','0');
		$this->db->where('order.order_code',$code);
		$this->db->where('order.cd_id',$_SESSION['cd_id']);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		}
		
		return NULL;
	}

	public function get_items($order_code){
		$return = array();
		$this->db->select("book_title,book_img,cart.item_code,item_price, count(cart.item_code) as quantity, (item_price*count(cart.item_code)) as total");
		$this->db->from("order");
		$this->db->join('cart', 'cart.order_code = order.order_code');
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->join('book', 'book.book_id = item_stock.item_id');
		$this->db->where('order.order_code',$order_code);
		$this->db->where('order.cd_id',$_SESSION['cd_id']);
		$this->db->group_by('cart.item_code');
		$this->db->order_by('cart_id','asc');

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function get_item_amount($code){
		$return = array();
		$this->db->select("sum(item_price) as total_amount");
		$this->db->from("cart");
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->where('cd_id',$_SESSION['cd_id']);
		$this->db->where('order_code',$code);

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function payment_conf($tbl,$data){
		$this->db->insert($tbl, $data);
	}

	public function payment_status($updated_data,$code){
		$this->db->where('order_code', $code);
		$this->db->update('order', $updated_data); 
	}

	public function get_order(){
		$return = array();
		$this->db->select("order.order_code,order_date,payment_status");
		$this->db->from("order");
		//$this->db->join('payment', 'payment.order_code = order.order_code','full outer');
		$this->db->where('order.cd_id',$_SESSION['cd_id']);
		$this->db->order_by('payment_status');
		$this->db->order_by('order_date','desc');

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function remove_order_from_order($code){
		$this->db->delete('order', array('order_code' => $code));
	}

	public function remove_order_from_cart($code){
		$this->db->delete('cart', array('order_code' => $code));
	}
}