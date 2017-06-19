<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_all_item() {
		$this->db->select('d.*, o.order_id');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->where('o.order_date', date('Y-m-d'));
		$this->db->order_by('d.product_id', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Chart_model.php */