<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_slider');
		$this->db->order_by('slider_id', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_name'		=> trim($this->input->post('name', 'true')),
					'slider_image' 		=> $this->upload->file_name,
				   	'slider_update' 	=> date('Y-m-d H:i')
				);
		} else {
			$data = array(
					'slider_name'		=> trim($this->input->post('name', 'true')),
				   	'slider_update' 	=> date('Y-m-d H:i')
				);
		}

		$this->db->insert('furnindo_slider', $data);
	}

	function update_data() {
		$slider_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(
					'slider_name'		=> trim($this->input->post('name', 'true')),
					'slider_image' 		=> $this->upload->file_name,
				   	'slider_update' 	=> date('Y-m-d H:i')
				);
		} else {
			$data = array(
					'slider_name'		=> trim($this->input->post('name', 'true')),
				   	'slider_update' 	=> date('Y-m-d H:i')
				);
		}

		$this->db->where('slider_id', $slider_id);
		$this->db->update('furnindo_slider', $data);
	}

	function delete_data($kode) {
		$this->db->where('slider_id', $kode);
		$this->db->delete('furnindo_slider');
	}
}
/* Location: ./application/models/admin/Slider_model.php */