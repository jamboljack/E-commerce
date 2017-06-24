<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$user_username = $this->session->userdata('username');

		$this->db->select('o.*, u.*');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->where('o.user_username', $user_username);
		$this->db->order_by('o.order_id', 'desc');
		
		return $this->db->get();
	}

	function select_detail($order_id) {
		$this->db->select('o.*, u.*, s.*, r.region_name, n.region_name as negara');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region User
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('o.order_id', $order_id);
		
		return $this->db->get();
	}

	function select_all_item($order_id) {
		$this->db->select('d.*, p.*, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('d.order_id', $order_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/Orders_model.php */