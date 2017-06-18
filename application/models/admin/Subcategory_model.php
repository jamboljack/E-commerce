<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_main_category() {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->order_by('maincategory_no', 'asc');
		
		return $this->db->get();
	}

	function select_all() {
		$this->db->select('s.*, m.maincategory_name');
		$this->db->from('furnindo_subcategory s');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->order_by('s.subcategory_no', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		$maincategory_id 	= $this->input->post('lstMainCategory', 'true');
		$subcategory_name	= ucwords(strtolower($this->input->post('name', 'true')));
		$subcategory_seo	= seo_title($this->input->post('name', 'true'));
		$subcategory_image	= $this->upload->file_name;
		$update 			= date('Y-m-d H:i:s');

		if (!empty($_FILES['userfile']['name'])) {
			return $this->db->query("INSERT INTO furnindo_subcategory 
			(maincategory_id, subcategory_no, subcategory_name, subcategory_name_seo, subcategory_image, subcategory_update)
			VALUES ('$maincategory_id', (SELECT (c.subcategory_no+1) FROM furnindo_subcategory c ORDER BY c.subcategory_no DESC LIMIT 1), '$subcategory_name', '$subcategory_seo', '$subcategory_image', '$update')");
		} else {
			return $this->db->query("INSERT INTO furnindo_subcategory 
			(maincategory_id, subcategory_no, subcategory_name, subcategory_name_seo, subcategory_update)
			VALUES ('$maincategory_id', (SELECT (c.subcategory_no+1) FROM furnindo_subcategory c ORDER BY c.subcategory_no DESC LIMIT 1), '$subcategory_name', '$subcategory_seo', '$update')");
		}
	}

	function update_data() {
		$subcategory_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'maincategory_id' 		=> $this->input->post('lstMainCategory', 'true'),
							'subcategory_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'subcategory_name_seo'	=> seo_title($this->input->post('name', 'true')),
							'subcategory_image' 	=> $this->upload->file_name,
				   			'subcategory_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'maincategory_id' 		=> $this->input->post('lstMainCategory', 'true'),
							'subcategory_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'subcategory_name_seo'	=> seo_title($this->input->post('name', 'true')),
				   			'subcategory_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('subcategory_id', $subcategory_id);
		$this->db->update('furnindo_subcategory', $data);
	}

	function delete_data($kode) {
		$this->db->where('subcategory_id', $kode);
		$this->db->delete('furnindo_subcategory');
	}

	function up($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_subcategory SET subcategory_no = '$posisi' WHERE subcategory_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_subcategory SET subcategory_no = '$posisi_baru' WHERE subcategory_id = '$id'");
	}

	function down($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_subcategory SET subcategory_no = '$posisi' WHERE subcategory_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_subcategory SET subcategory_no = '$posisi_baru' WHERE subcategory_id = '$id'");
	}
}
/* Location: ./application/models/admin/Subcategory_model.php */