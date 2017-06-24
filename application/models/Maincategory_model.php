<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->where('maincategory_id', $maincategory_id);
		
		return $this->db->get();
	}

	function select_sub_category($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->where('maincategory_id', $maincategory_id);
		$this->db->order_by('subcategory_no', 'asc');

		return $this->db->get();
	}

	function select_all_category($maincategory_id) {
		$this->db->select('c.*, m.*');
		$this->db->from('furnindo_category c');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->where('m.maincategory_id', $maincategory_id);
		$this->db->order_by('c.category_no', 'asc');

		return $this->db->get();
	}
}
/* Location: ./application/models/Maincategory_model.php */