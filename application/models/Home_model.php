<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_main_menu() {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_level', 'Main');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}

	function select_menu_level_1($category_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_subid', $category_id);
		$this->db->where('category_level', 'Level-1');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}

	function select_menu_level_2($category_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_subid', $category_id);
		$this->db->where('category_level', 'Level-2');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}

	function select_slider() {
		$this->db->select('*');
		$this->db->from('furnindo_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Home_model.php */