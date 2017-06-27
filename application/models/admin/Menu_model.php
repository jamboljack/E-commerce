<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_menu');
		$this->db->order_by('menu_id', 'asc');
		
		return $this->db->get();
	}

	function select_detail($menu_id) {
		$this->db->select('*');
		$this->db->from('furnindo_menu');
		$this->db->where('menu_id', $menu_id);
		
		return $this->db->get();
	}

	function update_data() {
		$menu_id     	= $this->input->post('id');

		$data = array(	'menu_name'		=> trim($this->input->post('name', 'true')),
						'menu_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
						'menu_desc'		=> trim($this->input->post('desc', 'true')),
				   		'menu_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('menu_id', $menu_id);
		$this->db->update('furnindo_menu', $data);
	}
}
/* Location: ./application/models/admin/Menu_model.php */