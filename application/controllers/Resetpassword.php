<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('resetpassword_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(site_url('login'));
	}

	public function key() {
		$data['error'] 		= 'false';
		$data['detail'] 	= $this->resetpassword_model->select_detail()->row();
		$this->template_front->display('resetpassword_v', $data);
	}

	public function updatedata() {
		$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('passwordconfirm', 'Password Confirm', 'required|matches[newpassword]');

		if ($this->form_validation->run() == FALSE) {
			$data['error'] 		= 'true';
			$data['detail'] 	= $this->resetpassword_model->select_detail()->row();
			$this->template_front->display('resetpassword_v', $data);
		} else {
			$this->resetpassword_model->update_data();
			$this->session->set_flashdata('notification','Your Password Reset Successfull.');
	 		redirect(site_url('resetpassword/success'));
	 	}
	}

	public function success() {
		$this->template_front->display('resetpassword_success_v');
	}
}
/* Location: ./application/controller/Resetpassword.php */
?>