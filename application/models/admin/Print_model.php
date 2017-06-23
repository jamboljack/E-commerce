<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_detail($invoice_id) {
		$this->db->select('i.*, o.*, u.*, s.*, r.region_name, n.region_name as negara');
		$this->db->from('furnindo_invoice i');
		$this->db->join('furnindo_order o', 'i.order_id = o.order_id'); // Order
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username'); // Pemesan
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region User
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('i.invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function select_all_item($invoice_id) {
		$this->db->select('d.*, p.product_name, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->join('furnindo_invoice i', 'i.order_id = o.order_id');
		$this->db->where('i.invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function select_contact($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}

	function select_detail_bank($bank_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_bank');
		$this->db->where('bank_id', $bank_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Print_model.php */