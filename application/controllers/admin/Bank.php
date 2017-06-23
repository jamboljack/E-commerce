<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/bank_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {	
			$data['detail'] 	= $this->bank_model->select_detail()->row();
			$this->template->display('admin/bank_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedata() {
		$this->bank_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/bank'));
	}
}
/* Location: ./application/controller/admin/Bank.php */