<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($bank_id = 1) {
		$this->db->select('*');
		$this->db->from('furnindo_bank');
		$this->db->where('bank_id', $bank_id);
		
		return $this->db->get();
	}
		
	function update_data($bank_id = 1) {
		$data = array(	'bank_name'			=> trim($this->input->post('name', 'true')),
						'bank_no_account'	=> trim($this->input->post('no_account', 'true')),
						'bank_owner'		=> trim($this->input->post('owner', 'true')),
						'bank_update' 		=> date('Y-m-d H:i')
		);
		
		$this->db->where('bank_id', $bank_id);
		$this->db->update('furnindo_bank', $data);
	}
}
/* Location: ./application/models/admin/bank_model.php */