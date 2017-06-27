<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
		
	function select_all() {
		$this->db->select('i.*, o.*, u.*');
		$this->db->from('furnindo_invoice i');
		$this->db->join('furnindo_order o', 'i.order_id = o.order_id');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->order_by('i.invoice_id', 'desc');
		
		return $this->db->get();
	}

	function select_order() {
		$this->db->select('o.*, u.*');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->where('o.order_status_invoice', 0);
		$this->db->where('o.order_status <>', 'Open');
		$this->db->order_by('o.order_id', 'desc');
		
		return $this->db->get();
	}

	function select_detail($order_id) {
		$this->db->select('o.*, u.*, s.*, r.region_name, n.region_name as negara');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region User
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('o.order_id', $order_id);
		
		return $this->db->get();
	}

	function select_all_item($order_id) {
		$this->db->select('d.*, p.product_name, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('d.order_id', $order_id);
		
		return $this->db->get();
	}

	function select_detail_invoice($invoice_id) {
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

	function select_all_item_invoice($invoice_id) {
		$this->db->select('d.*, p.product_name, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->join('furnindo_invoice i', 'i.order_id = o.order_id');
		$this->db->where('i.invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function update_data() {
		$invoice_id 	= $this->input->post('id', 'true');

		$data = array(	'invoice_status'	=> $this->input->post('lstStatus', 'true'),
				   		'invoice_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('invoice_id', $invoice_id);
		$this->db->update('furnindo_invoice', $data);
	}
}
/* Location: ./application/models/admin/Invoices_model.php */