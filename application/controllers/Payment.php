<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(base_url());
		$this->load->library('template_front');
		$this->load->model('payment_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['error'] 		= 'false';
			$data['detail'] 	= $this->payment_model->select_detail()->row();
			$data['listRegion'] = $this->payment_model->select_region()->result();
			$this->template_front->display('payment_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}


	public function updatedata() {
		$this->payment_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
	 	redirect(site_url('payment'));
	}	
}
/* Location: ./application/controller/Payment.php */
?>