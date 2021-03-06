<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/users_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {	
			$data['listData'] 	= $this->users_model->select_all()->result();
			$this->template->display('admin/users_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['listRegion'] = $this->users_model->select_region()->result();
		$this->template->display('admin/users_add_view', $data); 
	}

	public function savedata() {
		$this->form_validation->set_rules('username','<b>Username</b>','trim|required|max_length[30]|is_unique[furnindo_users.user_username]');
		$this->form_validation->set_rules('password','<b>Password</b>','trim|required');
		$this->form_validation->set_rules('name','<b>Name</b>','trim|required|is_unique[furnindo_users.user_name]');

		if ($this->form_validation->run() == FALSE) {
    		$data['listRegion'] = $this->users_model->select_region()->result();
			$this->template->display('admin/users_add_view', $data); 
    	} else {
			$this->users_model->insert_data();
			$this->session->set_flashdata('notification','Save Data Success.');
	 		redirect(site_url('admin/users'));
 		}
	}

	public function editdata($user_username) {
		$data['listRegion'] = $this->users_model->select_region()->result();
		$data['detail']	 	= $this->users_model->select_detail($user_username)->row();
		$this->template->display('admin/users_edit_view', $data); 
	}

	public function updatedata() {
		$this->users_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/users'));
	}
}
/* Location: ./application/controller/admin/Users.php */