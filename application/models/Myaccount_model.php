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
}
/* Location: ./application/models/admin/Myaccount_model.php */