<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_slider() {
		$this->db->select('*');
		$this->db->from('furnindo_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}

	function select_featured() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->order_by('p.product_id', 'desc');
		$this->db->limit(15);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/Home_model.php */