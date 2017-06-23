<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
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
		$user_username = $this->session->userdata('username_admin');
		
		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $user_username);
		
		return $this->db->get();
	}

	function update_data() {
		$user_username     	= trim($this->input->post('username', 'true'));
		
		$data = array(	'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
						'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
						'region_id'			=> $this->input->post('lstRegion', 'true'),
						'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
						'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
						'user_mobile'		=> trim($this->input->post('mobile', 'true')),
						'user_phone'		=> trim($this->input->post('phone', 'true')),
				   		'user_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->where('user_username', $user_username);
		$this->db->update('furnindo_users', $data);
	}

	function update_password() {
		$username  = trim($this->input->post('username', 'true'));
		
		$data = array(	    			
		    		'user_password' 	=> sha1(trim($this->input->post('newpassword', 'true'))),
	    			'user_update' 		=> date('Y-m-d H:i:s')
				);

		$this->db->where('user_username', $username);
		$this->db->update('furnindo_users', $data);
	}
}
/* Location: ./application/models/admin/Profile_model.php */