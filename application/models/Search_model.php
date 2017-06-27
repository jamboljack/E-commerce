<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all_product($keyword) {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->like('p.product_name', $keyword);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}
}
/* Location: ./application/models/Search_model.php */