<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/category_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['error'] 		= 'false';	
			$data['listData'] 	= $this->category_model->select_all()->result();
			$this->template->display('admin/category_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		$lvl 	= $this->input->post('lstLevel', 'true'); // Level

		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			$config['file_name']    	= 'Category_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/category/';
			$config['allowed_types'] 	= 'jpg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			
			if ($lvl == 'Main') {
				$config['width'] 			= 920;
				$config['height'] 			= 380;
			} else {
				$config['width'] 			= 200;
				$config['height'] 			= 200;
			}
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->category_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
	 	redirect(site_url('admin/category'));
	}

	public function updatedata() {
		$lvl 	= $this->input->post('lstLevel', 'true'); // Level

		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			$config['file_name']    	= 'Category_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/category/';
			$config['allowed_types'] 	= 'jpg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			
			if ($lvl == 'Main') {
				$config['width'] 			= 920;
				$config['height'] 			= 380;
			} else {
				$config['width'] 			= 200;
				$config['height'] 			= 200;
			}
			
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->category_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/category'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/category'));
		} else {
			$this->category_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/category'));
		}
	}

	public function up() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi-1;
		$this->category_model->up($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}

	public function down() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi+1;
		$this->category_model->down($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}
}
/* Location: ./application/controller/admin/Category.php */