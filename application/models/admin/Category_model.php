<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		$sub_category 	= $this->input->post('lstSubCategory', 'true');
		$category_name	= ucwords(strtolower($this->input->post('name', 'true')));
		$category_seo	= seo_title($this->input->post('name', 'true'));
		$category_image	= $this->upload->file_name;
		$level 			= $this->input->post('lstLevel', 'true');
		$update 		= date('Y-m-d H:i:s');

		if (!empty($_FILES['userfile']['name'])) {
			return $this->db->query("INSERT INTO furnindo_category 
			(category_subid, category_no, category_name, category_name_seo, category_image, category_level, category_update)
			VALUES ('$sub_category', (SELECT c.category_no+1 FROM furnindo_category c ORDER BY c.category_no DESC LIMIT 1), '$category_name', '$category_seo', '$category_image', '$level', '$update')");
		} else {
			return $this->db->query("INSERT INTO furnindo_category 
			(category_subid, category_no, category_name, category_name_seo, category_level, category_update)
			VALUES ('$sub_category', (SELECT c.category_no+1 FROM furnindo_category c ORDER BY c.category_no DESC LIMIT 1), '$category_name', '$category_seo', '$level', '$update')");
		}
	}

	function update_data() {
		$category_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'category_subid'	=> $this->input->post('lstSubCategory', 'true'),
							'category_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'category_name_seo'	=> seo_title($this->input->post('name', 'true')),
							'category_image' 	=> $this->upload->file_name,
							'category_level'	=> $this->input->post('lstLevel', 'true'),
				   			'category_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'category_subid'	=> $this->input->post('lstSubCategory', 'true'),
							'category_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'category_name_seo'	=> seo_title($this->input->post('name', 'true')),
							'category_level'	=> $this->input->post('lstLevel', 'true'),
				   			'category_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('category_id', $category_id);
		$this->db->update('furnindo_category', $data);
	}

	function delete_data($kode) {
		$this->db->where('category_id', $kode);
		$this->db->delete('furnindo_category');
	}

	function up($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi' WHERE category_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi_baru' WHERE category_id = '$id'");
	}

	function down($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi' WHERE category_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi_baru' WHERE category_id = '$id'");
	}
}
/* Location: ./application/models/admin/Category_model.php */