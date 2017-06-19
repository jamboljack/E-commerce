<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_region() {
		$this->db->select('*');
		$this->db->from('furnindo_region');
		$this->db->order_by('region_name', 'asc');
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Register_model.php */