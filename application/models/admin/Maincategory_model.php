<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->order_by('maincategory_no', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		$maincategory_name		= ucwords(strtolower($this->input->post('name', 'true')));
		$maincategory_seo		= seo_title($this->input->post('name', 'true'));
		$maincategory_image		= $this->upload->file_name;
		$maincategory_collect 	= $this->input->post('chkCollect', 'true');
		$update 				= date('Y-m-d H:i:s');

		if (!empty($_FILES['userfile']['name'])) {
			return $this->db->query("INSERT INTO furnindo_maincategory 
			(maincategory_no, maincategory_name, maincategory_name_seo, maincategory_image, maincategory_collect, maincategory_update)
			VALUES ((SELECT (c.maincategory_no+1) FROM furnindo_maincategory c ORDER BY c.maincategory_no DESC LIMIT 1), '$maincategory_name', '$maincategory_seo', '$maincategory_image', '$maincategory_collect', '$update')");
		} else {
			return $this->db->query("INSERT INTO furnindo_maincategory 
			(maincategory_no, maincategory_name, maincategory_name_seo, maincategory_collect, maincategory_update)
			VALUES ((SELECT (c.maincategory_no+1) FROM furnindo_maincategory c ORDER BY c.maincategory_no DESC LIMIT 1), '$maincategory_name', '$maincategory_seo', '$maincategory_collect', '$update')");
		}
	}

	function update_data() {
		$maincategory_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'maincategory_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'maincategory_name_seo'	=> seo_title($this->input->post('name', 'true')),
							'maincategory_image' 	=> $this->upload->file_name,
							'maincategory_collect' 	=> $this->input->post('chkCollect', 'true'),
				   			'maincategory_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'maincategory_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
							'maincategory_name_seo'	=> seo_title($this->input->post('name', 'true')),
							'maincategory_collect' 	=> $this->input->post('chkCollect', 'true'),
				   			'maincategory_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('maincategory_id', $maincategory_id);
		$this->db->update('furnindo_maincategory', $data);
	}

	function select_image($kode) {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->where('maincategory_id', $kode);
		
		return $this->db->get();
	}

	function delete_data($kode) {
		// Hapus File Image
		/*$image 		= $this->maincategory_model->select_image($kode)->row();
		$filename 	= $image->maincategory_image;
		$path 		= '../img/maincategory/'.$filename;
      	if(is_file($path)){      		
        	unlink(base_url().'/img/maincategory'.$filename);
        	unlink($path);
        	echo 'File '.$filename.' has been deleted';
      	} else {
      		echo 'Could not delete '.$filename.', file does not exist';
      		echo '<br>'.$path;
      	}*/
		$this->db->where('maincategory_id', $kode);
		$this->db->delete('furnindo_maincategory');
	}

	function up($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_maincategory SET maincategory_no = '$posisi' WHERE maincategory_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_maincategory SET maincategory_no = '$posisi_baru' WHERE maincategory_id = '$id'");
	}

	function down($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_maincategory SET maincategory_no = '$posisi' WHERE maincategory_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_maincategory SET maincategory_no = '$posisi_baru' WHERE maincategory_id = '$id'");
	}
}
/* Location: ./application/models/admin/Maincategory_model.php */