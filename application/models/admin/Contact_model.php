<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($contact_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_contact');
		$this->db->where('contact_id', $contact_id);
		
		return $this->db->get();
	}
		
	function update_data($contact_id = 1) {
		$data = array(	'contact_name'		=> trim($this->input->post('name', 'true')),
						'contact_address'	=> trim($this->input->post('address', 'true')),
						'contact_city'		=> trim($this->input->post('city', 'true')),
						'contact_region'	=> trim($this->input->post('region', 'true')),
						'contact_zipcode'	=> trim($this->input->post('zipcode', 'true')),
						'contact_phone'		=> trim($this->input->post('phone', 'true')),
						'contact_wa'		=> trim($this->input->post('wa', 'true')),
						'contact_email'		=> trim($this->input->post('email', 'true')),
						'contact_work'		=> trim($this->input->post('work', 'true')),
						'contact_update' 	=> date('Y-m-d H:i')
		);
		
		$this->db->where('contact_id', $contact_id);
		$this->db->update('furnindo_contact', $data);
	}
}
/* Location: ./application/models/admin/Contact_model.php */