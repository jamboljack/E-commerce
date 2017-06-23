<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('o.*, u.*');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->order_by('o.order_id', 'desc');
		
		return $this->db->get();
	}
	
	function select_region() {
		$this->db->select('*');
		$this->db->from('furnindo_region');
		$this->db->order_by('region_name', 'asc');
		
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

	function update_data() {
		$order_id 	= $this->input->post('id');
		$status 	= $this->input->post('lstStatus');

		if ($status == 'Process') {
			$namafield = 'order_date_process';
		} elseif ($status == 'Shipping') {
			$namafield = 'order_date_shipping';
		} elseif ($status == 'Closed') {
			$namafield = 'order_date_closed';
		} else {
			$namafield = 'order_date_open';
		}

		$data = array(	'order_status'	=> $this->input->post('lstStatus', 'true'),
						'order_total'	=> $this->input->post('total', 'true'),
						$namafield 		=> date('Y-m-d'),
				   		'order_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('order_id', $order_id);
		$this->db->update('furnindo_order', $data);
	}

	function delete_data($kode) {
		$this->db->where('order_id', $kode);
		$this->db->delete('furnindo_order');
	}
}
/* Location: ./application/models/admin/Orders_model.php */