<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory_model extends CI_Model {
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
		$this->db->join('furnindo_category c', 'p.main_category = c.category_id');
		$this->db->where('p.main_category', $category_id);
		$this->db->order_by('p.product_id', 'desc');

		return $this->db->get();
	}


}
/* Location: ./application/models/admin/Maincategory_model.php */