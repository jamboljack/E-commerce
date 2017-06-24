<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$user_username = $this->session->userdata('username');

		$this->db->select('i.*, o.*, u.*');
		$this->db->from('furnindo_invoice i');
		$this->db->join('furnindo_order o', 'i.order_id = o.order_id');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->where('o.user_username', $user_username);
		$this->db->order_by('i.invoice_id', 'desc');
		
		return $this->db->get();
	}
}
/* Location: ./application/models/Invoices_model.php */