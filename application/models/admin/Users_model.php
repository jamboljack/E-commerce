<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('u.*, r.region_name');
		$this->db->from('furnindo_users u');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id');
		$this->db->order_by('u.user_name', 'asc');
		
		return $this->db->get();
	}

	function select_region() {
		$this->db->select('*');
		$this->db->from('furnindo_region');
		$this->db->order_by('region_name', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		$data = array(	'user_username'		=> trim($this->input->post('username', 'true')),
						'user_password'		=> sha1(trim($this->input->post('password', 'true'))),
						'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
						'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
						'region_id'			=> $this->input->post('lstRegion', 'true'),
						'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
						'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
						'user_mobile'		=> trim($this->input->post('mobile', 'true')),
						'user_phone'		=> trim($this->input->post('phone', 'true')),
						'user_level'		=> $this->input->post('lstLevel', 'true'),
						'user_status'		=> 'Active',
				   		'user_date_create' 	=> date('Y-m-d H:i:s'),
				   		'user_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->insert('furnindo_users', $data);
	}

	function select_detail($user_username) {
		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $user_username);
		
		return $this->db->get();
	}

	function update_data() {
		$user_username     	= $this->input->post('id');
		$password 			= trim($this->input->post('password'));

		if (empty($password)) {
			$data = array(	'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
							'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
							'region_id'			=> $this->input->post('lstRegion', 'true'),
							'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
							'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
							'user_mobile'		=> trim($this->input->post('mobile', 'true')),
							'user_phone'		=> trim($this->input->post('phone', 'true')),
							'user_level'		=> $this->input->post('lstLevel', 'true'),
							'user_status'		=> $this->input->post('lstStatus', 'true'),
				   			'user_update' 		=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'user_password'		=> sha1(trim($this->input->post('password', 'true'))),
							'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
							'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
							'region_id'			=> $this->input->post('lstRegion', 'true'),
							'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
							'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
							'user_mobile'		=> trim($this->input->post('mobile', 'true')),
							'user_phone'		=> trim($this->input->post('phone', 'true')),
							'user_level'		=> $this->input->post('lstLevel', 'true'),
							'user_status'		=> $this->input->post('lstStatus', 'true'),
				   			'user_update' 		=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('user_username', $user_username);
		$this->db->update('furnindo_users', $data);
	}
}
/* Location: ./application/models/admin/Users_model.php */