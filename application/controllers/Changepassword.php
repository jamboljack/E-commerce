<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(base_url());
		$this->load->library('template_front');
		$this->load->model('changepassword_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['error'] 		= 'false';
			$data['detail'] 	= $this->changepassword_model->select_detail()->row();
			$this->template_front->display('changepassword_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function updatedata() {
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passwordconfirm', 'Password Confirm', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['error'] 		= 'true';
			$data['detail'] 	= $this->changepassword_model->select_detail()->row();
			$this->template_front->display('changepassword_v', $data);
		} else {
			$this->changepassword_model->update_data();
			$this->session->set_flashdata('notification','Your Password Change Successfull.');
	 		redirect(site_url('changepassword'));
	 	}
	}	
}
/* Location: ./application/controller/Changepassword.php */
?>