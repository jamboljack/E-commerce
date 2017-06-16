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

	function select_best_product() {
		$this->db->select('*');
		$this->db->from('furnindo_product');
		$this->db->where('product_best', 1);
		$this->db->order_by('product_name', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Menu_model.php */