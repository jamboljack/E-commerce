<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($subcategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->where('subcategory_id', $subcategory_id);
		
		return $this->db->get();
	}

	function select_all_category($subcategory_id) {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->where('c.subcategory_id', $subcategory_id);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}


}
/* Location: ./application/models/admin/Subcategory_model.php */