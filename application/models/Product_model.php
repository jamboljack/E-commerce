<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($product_id) {
		$this->db->select('p.*, m.*');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->where('p.product_id', $product_id);
		
		return $this->db->get();
	}

	function select_other_product($category_id, $product_id) {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('p.category_id', $category_id);
		$this->db->where('p.product_id <>', $product_id);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}

	function select_all_image($product_id) {
		$this->db->select('*');
		$this->db->from('furnindo_product_image');
		$this->db->where('product_id', $product_id);

		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Product_model.php */