<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_report_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all_invoices($status, $from, $to) {
		if ($status == 'all') {
			$this->db->select('i.*, o.*, u.*');
			$this->db->from('furnindo_invoice i');
			$this->db->join('furnindo_order o', 'i.order_id = o.order_id');
			$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
			$this->db->where('i.invoice_date >=', $from);
			$this->db->where('i.invoice_date <=', $to);
			$this->db->order_by('i.invoice_id', 'desc');
			
			return $this->db->get();
		} else {
			$this->db->select('i.*, o.*, u.*');
			$this->db->from('furnindo_invoice i');
			$this->db->join('furnindo_order o', 'i.order_id = o.order_id');
			$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
			$this->db->where('i.invoice_status', $status);
			$this->db->where('i.invoice_date >=', $from);
			$this->db->where('i.invoice_date <=', $to);
			$this->db->order_by('i.invoice_id', 'desc');
			
			return $this->db->get();
		}
	}
}
/* Location: ./application/models/reports/Invoices_report_model.php */