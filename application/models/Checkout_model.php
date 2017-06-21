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
}
/* Location: ./application/models/admin/Checkout_model.php */