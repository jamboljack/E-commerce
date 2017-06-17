<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_contact($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
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
	
	function select_best_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.main_category = c.category_id');
		$this->db->where('p.product_best', 1);
		$this->db->order_by('p.product_name', 'asc');
		
		return $this->db->get();
	}

	function select_special_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.main_category = c.category_id');
		$this->db->where('p.product_special', 1);
		$this->db->order_by('p.product_name', 'asc');
		
		return $this->db->get();
	}

	function select_new_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.main_category = c.category_id');
		$this->db->where('p.product_new', 1);
		$this->db->order_by('p.product_name', 'asc');
		
		return $this->db->get();
	}

	function select_social() {
		$this->db->select('*');
		$this->db->from('furnindo_social');
		$this->db->order_by('social_id', 'asc');
		
		return $this->db->get();
	}

	function select_brand() {
		$this->db->select('*');
		$this->db->from('furnindo_brand');
		$this->db->order_by('brand_name', 'asc');
		
		return $this->db->get();
	}

	// Breadcrumb Main
	function select_detail_main($main_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_id', $main_id);
		
		return $this->db->get();
	}
	// Breadcrumb Sub Level 1
	function select_detail_subcategory($sub_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_id', $sub_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Menu_model.php */