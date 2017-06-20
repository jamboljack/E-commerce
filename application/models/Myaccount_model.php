<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount_model extends CI_Model {
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
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $username);
		
		return $this->db->get();
	}

	function update_data() {
		$username = $this->session->userdata('username');

		$data = array(	
				'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
				'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
				'region_id'			=> $this->input->post('lstRegion', 'true'),
				'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
				'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
				'user_mobile'		=> trim($this->input->post('mobile', 'true')),
				'user_phone'		=> trim($this->input->post('phone', 'true')),
				'user_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->where('user_username', $username);
		$this->db->update('furnindo_users', $data);
	}
}
/* Location: ./application/models/admin/Myaccount_model.php */