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
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_subid', $category_id);
		$this->db->where('category_level', 'Level-1');
		$this->db->order_by('category_no', 'asc');

		return $this->db->get();
	}


}
/* Location: ./application/models/admin/Maincategory_model.php */