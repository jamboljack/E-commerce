<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all() {
		$username = $this->session->userdata('username');

		$this->db->select('w.*, p.*, c.category_name');
		$this->db->from('furnindo_wishlist w');
		$this->db->join('furnindo_product p', 'w.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('w.user_username', $username);
		$this->db->order_by('p.product_id', 'asc');
		
		return $this->db->get();
	}

	function check_product($product_id) {
		$username = $this->session->userdata('username');

		$this->db->select('*');
		$this->db->from('furnindo_wishlist');
		$this->db->where('product_id', $product_id);
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function insert_data($product_id) {
		$username = $this->session->userdata('username');

		$data = array(	
				'user_username'		=> $username,
				'product_id'		=> $product_id,
				'wishlist_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('furnindo_wishlist', $data);
	}

	function delete_data($wishlist_id) {
		$this->db->where('wishlist_id', $wishlist_id);
		$this->db->delete('furnindo_wishlist');
	}
}
/* Location: ./application/models/Wishlist_model.php */