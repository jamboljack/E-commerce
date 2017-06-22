<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all_item() {
		$username = $this->session->userdata('username');

		$this->db->select('p.*, t.*, c.category_name');
		$this->db->from('furnindo_order_temp t');
		$this->db->join('furnindo_product p', 't.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('t.temp_date_order', date('Y-m-d'));
		$this->db->where('t.user_username', $username);
		$this->db->order_by('p.product_id', 'asc');
		
		return $this->db->get();
	}

	function select_detail() {
		$username = $this->session->userdata('username');

		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function select_region() {
		$this->db->select('*');
		$this->db->from('furnindo_region');
		$this->db->order_by('region_name', 'asc');
		
		return $this->db->get();
	}

	function select_detail_order($order_id) {
		$this->db->select('o.*, u.*, r.region_name, s.*, n.region_name as negara');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username'); // Users
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id'); // Shipping
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('o.order_id', $order_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Checkout_model.php */