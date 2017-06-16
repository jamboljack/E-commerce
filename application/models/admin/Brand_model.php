<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_brand');
		$this->db->order_by('brand_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'brand_name'		=> trim($this->input->post('name', 'true')),
							'brand_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'brand_image' 		=> $this->upload->file_name,
				   			'brand_update' 		=> date('Y-m-d H:i')
			);
		} else {
			$data = array(	'brand_name'		=> trim($this->input->post('name', 'true')),
							'brand_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
				   			'brand_update' 		=> date('Y-m-d H:i')
			);
		}

		$this->db->insert('furnindo_brand', $data);
	}

	function update_data() {
		$brand_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'brand_name'		=> trim($this->input->post('name', 'true')),
							'brand_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'brand_image' 		=> $this->upload->file_name,
				   			'brand_update' 		=> date('Y-m-d H:i')
			);
		} else {
			$data = array(	'brand_name'		=> trim($this->input->post('name', 'true')),
							'brand_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
				   			'brand_update' 		=> date('Y-m-d H:i')
			);
		}

		$this->db->where('brand_id', $brand_id);
		$this->db->update('furnindo_brand', $data);
	}

	function delete_data($kode) {
		$this->db->where('brand_id', $kode);
		$this->db->delete('furnindo_brand');
	}
}
/* Location: ./application/models/admin/Brand_model.php */