<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_detail() {
		$key 	= $this->uri->segment(3);

		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_key_forgot', $key);
		
		return $this->db->get();
	}

	function update_data() {
		$key 	= $this->uri->segment(3);

		$data = array(	
				'user_password'		=> sha1(trim($this->input->post('password', 'true'))),
				'user_update' 		=> date('Y-m-d H:i:s')
		);

		$this->db->where('user_key_forgot', $key);
		$this->db->update('furnindo_users', $data);
	}
}
/* Location: ./application/models/Resetpassword_model.php */