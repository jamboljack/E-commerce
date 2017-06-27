<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/menu_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {	
			$data['listData'] 	= $this->menu_model->select_all()->result();
			$this->template->display('admin/menu_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function editdata($menu_id) {
		$data['detail']	 	= $this->menu_model->select_detail($menu_id)->row();
		$this->template->display('admin/menu_edit_view', $data); 
	}

	public function updatedata() {
		$this->menu_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/menu'));
	}
}
/* Location: ./application/controller/admin/Menu.php */