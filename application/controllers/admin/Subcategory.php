<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/subcategory_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listMain'] 	= $this->subcategory_model->select_main_category()->result();
			$data['listData'] 	= $this->subcategory_model->select_all()->result();
			$this->template->display('admin/subcategory_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));

			$config['file_name']    	= 'SubCategory_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/subcategory/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 200;
			$config['height'] 			= 200;
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->subcategory_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
	 	redirect(site_url('admin/subcategory'));
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));

			$config['file_name']    	= 'SubCategory_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/subcategory/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 200;
			$config['height'] 			= 200;
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->subcategory_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/subcategory'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/subcategory'));
		} else {
			$this->subcategory_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/subcategory'));
		}
	}

	public function up() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi-1;
		$this->subcategory_model->up($id, $posisi, $posisi_baru);
		redirect(site_url('admin/subcategory'));
	}

	public function down() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi+1;
		$this->subcategory_model->down($id, $posisi, $posisi_baru);
		redirect(site_url('admin/subcategory'));
	}
}
/* Location: ./application/controller/admin/Subcategory.php */