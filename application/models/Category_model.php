<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($category_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_id', $category_id);
		
		return $this->db->get();
	}

	function select_all_product($category_id) {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('p.category_id', $category_id);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}

	function select_all_collection($category_id) {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('p.collection_id', $category_id);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}

}
/* Location: ./application/models/Category_model.php */