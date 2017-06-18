<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/maincategory_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 	= $this->maincategory_model->select_all()->result();
			$this->template->display('admin/maincategory_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));

			$config['file_name']    	= 'MainCategory_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/maincategory/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 920;
			$config['height'] 			= 380;
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->maincategory_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
	 	redirect(site_url('admin/maincategory'));
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			
			$config['file_name']    	= 'MainCategory_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/maincategory/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 920;
			$config['height'] 			= 380;
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->maincategory_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/maincategory'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/maincategory'));
		} else {
			$this->maincategory_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/maincategory'));
		}
	}

	public function up() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi-1;
		$this->maincategory_model->up($id, $posisi, $posisi_baru);
		redirect(site_url('admin/maincategory'));
	}

	public function down() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi+1;
		$this->maincategory_model->down($id, $posisi, $posisi_baru);
		redirect(site_url('admin/maincategory'));
	}
}
/* Location: ./application/controller/admin/Maincategory.php */