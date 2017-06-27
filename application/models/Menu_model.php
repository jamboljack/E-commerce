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

	function select_main_category() {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->order_by('maincategory_no', 'asc');
		
		return $this->db->get();
	}

	function select_sub_category($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->where('maincategory_id', $maincategory_id);
		$this->db->order_by('subcategory_no', 'asc');
		
		return $this->db->get();
	}

	function select_category($subcategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('subcategory_id', $subcategory_id);
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}
	
	function select_best_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('p.product_best', 1);
		$this->db->order_by('p.product_name', 'asc');
		
		return $this->db->get();
	}

	function select_special_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('p.product_special', 1);
		$this->db->order_by('p.product_name', 'asc');
		
		return $this->db->get();
	}

	function select_new_product() {
		$this->db->select('p.*, c.category_name');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
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

	// Breadcrumb Main Category
	function select_detail_main($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->where('maincategory_id', $maincategory_id);
		
		return $this->db->get();
	}
	// Breadcrumb Sub Category
	function select_detail_subcategory($subcategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->where('subcategory_id', $subcategory_id);
		
		return $this->db->get();
	}
	// Breadcrumb Category
	function select_detail_category($category_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_id', $category_id);
		
		return $this->db->get();
	}

	function select_all_item() {
		$username = $this->session->userdata('username');

		$this->db->select('p.*, t.*, c.category_name');
		$this->db->from('furnindo_order_temp t');
		$this->db->join('furnindo_product p', 't.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('t.temp_date_order', date('Y-m-d'));
		$this->db->where('t.user_username', $username);
		$this->db->order_by('p.product_id', 'asc');
		
		return $this->db->get();
	}

	function select_wishlist() {
		$username = $this->session->userdata('username');

		$this->db->select('w.*, p.*, c.category_name');
		$this->db->from('furnindo_wishlist w');
		$this->db->join('furnindo_product p', 'w.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('w.user_username', $username);
		
		return $this->db->get();
	}

	function select_menu() {
		$this->db->select('*');
		$this->db->from('furnindo_menu');
		$this->db->order_by('menu_id', 'asc');
		
		return $this->db->get();
	}

	function select_detail_menu($menu_id) {
		$this->db->select('*');
		$this->db->from('furnindo_menu');
		$this->db->where('menu_id', $menu_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/Menu_model.php */