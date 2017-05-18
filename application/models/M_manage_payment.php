<?php 
class M_manage_payment extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_all_payment(){
		$return = array();
		$this->db->select("order_date,order.order_code,payment_date,cd_fullname");
		$this->db->from("payment");
		$this->db->join('order', 'order.order_code = payment.order_code');
		$this->db->join('customer_detail','customer_detail.cd_id=order.cd_id');
		$this->db->where('payment.confirm_by', null);
		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function get_order_detail($code){
		$return = array();
		$this->db->select("order_date,order.order_code,payment_date,cd_fullname,cd_email,cd_phone,cd_address,cd_postal_code,bank,bank_acc_num,bank_acc_name,payment_receipt");
		$this->db->from("payment");
		$this->db->join('order', 'order.order_code = payment.order_code');
		$this->db->join('customer_detail','customer_detail.cd_id=order.cd_id');
		$this->db->where('order.order_code', $code);
		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}

	public function get_cart($code){
		$return = array();
		$this->db->select("book_title,book_img,cart.item_code,item_price, count(cart.item_code) as quantity, (item_price*count(cart.item_code)) as total");
		$this->db->from("cart");
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->join('book', 'book.book_id = item_stock.item_id');
		$this->db->where('cart.order_code',$code);
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

	public function get_order_amount($code){
		$return = array();
		$this->db->select("sum(item_price) as total_amount");
		$this->db->from("cart");
		$this->db->join('item_stock', 'item_stock.item_code = cart.item_code');
		$this->db->where('order_code',$code);

		$query = $this->db->get();

		 if ($query->num_rows()>0) {
		 	foreach ($query->result() as $row) {
		 		array_push($return, $row);
			}
		}
		return $return;
	}
}