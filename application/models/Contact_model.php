<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

	function select_contact($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}
}
/* Location: ./application/models/admin/Contact_model.php */