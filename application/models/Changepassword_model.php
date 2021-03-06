<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword_model extends CI_Model {
	function __construct() {
		parent::__construct();	
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
				'user_password'		=> sha1(trim($this->input->post('password', 'true'))),
				'user_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->where('user_username', $username);
		$this->db->update('furnindo_users', $data);
	}
}
/* Location: ./application/models/Changepassword_model.php */