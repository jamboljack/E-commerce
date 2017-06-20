<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_region() {
		$this->db->select('*');
		$this->db->from('furnindo_region');
		$this->db->order_by('region_name', 'asc');
		
		return $this->db->get();
	}

	function select_detail() {
		$username = $this->session->userdata('username');

		$this->db->select('*');
		$this->db->from('furnindo_payment');
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function update_data() {
		$payment_id = $this->input->post('id');

		$data = array(	
				'payment_company'	=> strtoupper(trim($this->input->post('name', 'true'))),
				'payment_address'	=> strtoupper(trim($this->input->post('address', 'true'))),
				'region_id'			=> $this->input->post('lstRegion', 'true'),
				'payment_city'		=> strtoupper(trim($this->input->post('city', 'true'))),
				'payment_zipcode'	=> trim($this->input->post('zipcode', 'true')),
				'payment_phone'		=> trim($this->input->post('zipcode', 'true')),
				'payment_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('payment_id', $payment_id);
		$this->db->update('furnindo_payment', $data);
	}
}
/* Location: ./application/models/admin/Payment_model.php */