<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_report_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all_orders($status, $from, $to) {
		if ($status == 'all') {
			$this->db->select('o.*, u.*');
			$this->db->from('furnindo_order o');
			$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
			$this->db->where('o.order_date >=', $from);
			$this->db->where('o.order_date <=', $to);
			$this->db->order_by('o.order_id', 'desc');
			
			return $this->db->get();
		} else {
			$this->db->select('o.*, u.*');
			$this->db->from('furnindo_order o');
			$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
			$this->db->where('o.order_status', $status);
			$this->db->where('o.order_date >=', $from);
			$this->db->where('o.order_date <=', $to);
			$this->db->order_by('o.order_id', 'desc');
			
			return $this->db->get();
		}
	}
}
/* Location: ./application/models/admin/Orders_report_model.php */