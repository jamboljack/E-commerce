<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/contact_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {	
			$data['detail'] 		= $this->contact_model->select_detail()->row();
			$this->template->display('admin/contact_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();

			$config['file_name']    	= 'Logo_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/logo/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->contact_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/contact'));
	}
}
/* Location: ./application/controller/admin/Contact.php */