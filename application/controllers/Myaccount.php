<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(site_url('login'));
		$this->load->library('template_front');
		$this->load->model('myaccount_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['detail'] 	= $this->myaccount_model->select_detail()->row();
			$data['listRegion'] = $this->myaccount_model->select_region()->result();
			$this->template_front->display('myaccount_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(site_url('login'));
		}
	}

	public function updatedata() {
		$this->myaccount_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('myaccount'));
	}

	public function logout() {
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-chace');
		$this->session->sess_destroy();
		redirect(base_url());
	}		
}
/* Location: ./application/controller/Myaccount.php */
?>