<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/social_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['error'] 		= 'false';
			$data['listData'] 	= $this->social_model->select_all()->result();
			$this->template->display('admin/social_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function savedata() {
		$this->form_validation->set_rules('name','<b>Social Media Name</b>','trim|required|max_length[50]|is_unique[furnindo_social.social_name]');
		$this->form_validation->set_rules('url','<b>Social Media URL</b>','trim|required|valid_url');

		if ($this->form_validation->run() == FALSE) {
			$data['error'] 		= 'true';	
    		$data['listData'] 	= $this->social_model->select_all()->result();
			$this->template->display('admin/social_view', $data);
		} else {    		
			if (!empty($_FILES['userfile']['name'])) {
				$jam 	= time();
				$name 	= seo_title(trim($this->input->post('name', 'true')));
				$config['file_name']    	= 'Social_'.$name.'_'.$jam.'.jpg';
				$config['upload_path'] 		= './img/socialicons/';
				$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';
				$config['overwrite'] 		= TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('userfile');
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 32; // 32 Px
				$config['height'] 			= 32; // 32 px
				$this->load->library('image_lib',$config);
				$this->image_lib->resize();
			} elseif (empty($_FILES['userfile']['name'])){
				$config['file_name'] = '';
			}

			$this->social_model->insert_data();
			$this->session->set_flashdata('notification','Save Data Success.');
	 		redirect(site_url('admin/social'));
	 	}
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			$config['file_name']    	= 'Social_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/socialicons/';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif|png';
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 32; // 32 Px
			$config['height'] 			= 32; // 32 px
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->social_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/social'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/social'));
		} else {
			$this->social_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/social'));
		}
	}
}
/* Location: ./application/controller/admin/Social.php */