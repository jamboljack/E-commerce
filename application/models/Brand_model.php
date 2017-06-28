<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($brand_id) {
		$this->db->select('*');
		$this->db->from('furnindo_brand');
		$this->db->where('brand_id', $brand_id);
		
		return $this->db->get();
	}

	function select_all_product($brand_id) {
		$this->db->select('p.*');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_brand b', 'p.brand_id = b.brand_id');
		$this->db->where('p.brand_id', $brand_id);
		$this->db->order_by('p.product_name', 'asc');

		return $this->db->get();
	}
}
/* Location: ./application/models/Brand_model.php */