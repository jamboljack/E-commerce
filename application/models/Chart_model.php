<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model {
	function __construct() {
		parent::__construct();	
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

	function check_product($product_id) {
		$username = $this->session->userdata('username');

		$this->db->select('*');
		$this->db->from('furnindo_order_temp');
		$this->db->where('temp_date_order', date('Y-m-d'));
		$this->db->where('product_id', $product_id);
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function update_qty_temp($temp_id, $newQty) {
		$data = array(	
				'temp_qty'		=> $newQty,
				'temp_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('temp_id', $temp_id);
		$this->db->update('furnindo_order_temp', $data);
	}

	function insert_order_temp($product_id, $Qty) {
		$username = $this->session->userdata('username');

		$data = array(	
				'user_username'		=> $username,
				'product_id'		=> $product_id,
				'temp_qty'			=> $Qty,
				'temp_date_order' 	=> date('Y-m-d'),
				'temp_date_time' 	=> date('Y-m-d H:i:s'),
				'temp_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->insert('furnindo_order_temp', $data);
	}

	function update_order_temp($temp_id, $Qty) {
		$username = $this->session->userdata('username');

		$data = array(	
				'temp_qty'			=> $Qty,
				'temp_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->where('temp_id', $temp_id);
		$this->db->update('furnindo_order_temp', $data);
	}

	function delete_data_item($temp_id) {
		$this->db->where('temp_id', $temp_id);
		$this->db->delete('furnindo_order_temp');
	}
}
/* Location: ./application/models/Chart_model.php */