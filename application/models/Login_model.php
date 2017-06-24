<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function get_user($username) {
		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $username);

		return $this->db->get();
	}

	function check_user_account($username, $password) {
		$this->db->select('*');
		$this->db->from('furnindo_users');
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);
		$this->db->where('user_level', 'Member');
		$this->db->where('user_status', 'Active');

		return $this->db->get();
	}
}
/* Location: ./application/models/Login_model.php */