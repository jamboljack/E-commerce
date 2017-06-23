<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_open() {
		$this->db->select('*');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Open');
		
		return $this->db->get();
	}

	function select_qty_open() {
		$this->db->select('SUM(d.detail_qty) as Qty');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->where('o.order_status', 'Open');
		
		return $this->db->get();
	}

	function select_total_open() {
		$this->db->select('SUM(order_total) as total');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Open');
		
		return $this->db->get();
	}

	function select_process() {
		$this->db->select('*');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Process');
		
		return $this->db->get();
	}

	function select_qty_process() {
		$this->db->select('SUM(d.detail_qty) as Qty');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->where('o.order_status', 'Process');
		
		return $this->db->get();
	}

	function select_total_process() {
		$this->db->select('SUM(order_total) as total');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Process');
		
		return $this->db->get();
	}

	function select_shipping() {
		$this->db->select('*');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Shipping');
		
		return $this->db->get();
	}

	function select_qty_shipping() {
		$this->db->select('SUM(d.detail_qty) as Qty');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->where('o.order_status', 'Shipping');
		
		return $this->db->get();
	}

	function select_total_shipping() {
		$this->db->select('SUM(order_total) as total');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Shipping');
		
		return $this->db->get();
	}

	function select_closed() {
		$this->db->select('*');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Closed');
		
		return $this->db->get();
	}

	function select_qty_closed() {
		$this->db->select('SUM(d.detail_qty) as Qty');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->where('o.order_status', 'Closed');
		
		return $this->db->get();
	}

	function select_total_closed() {
		$this->db->select('SUM(order_total) as total');
		$this->db->from('furnindo_order');
		$this->db->where('order_status', 'Closed');
		
		return $this->db->get();
	}

	function select_orders() {
		$this->db->select('o.*, u.user_name, u.user_address');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->order_by('order_id', 'desc');
		$this->db->limit(10);

		return $this->db->get();
	}
}
/* Location: ./application/model/admin/Home_model.php */