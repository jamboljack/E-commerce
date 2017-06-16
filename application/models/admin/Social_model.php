<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_social');
		$this->db->order_by('social_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'social_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'social_url'		=> trim($this->input->post('url', 'true')),
							'social_icon' 		=> $this->upload->file_name,
				   			'social_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'social_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'social_url'		=> trim($this->input->post('url', 'true')),
				   			'social_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->insert('furnindo_social', $data);
	}

	function update_data() {
		$social_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'social_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'social_url'		=> trim($this->input->post('url', 'true')),
							'social_icon' 		=> $this->upload->file_name,
				   			'social_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'social_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'social_url'		=> trim($this->input->post('url', 'true')),
				   			'social_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('social_id', $social_id);
		$this->db->update('furnindo_social', $data);
	}

	function delete_data($kode) {
		$this->db->where('social_id', $kode);
		$this->db->delete('furnindo_social');
	}
}
/* Location: ./application/models/admin/Social_model.php */