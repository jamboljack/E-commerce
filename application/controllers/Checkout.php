<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('checkout_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['detail'] 	= $this->checkout_model->select_detail()->row();
			$data['listRegion'] = $this->checkout_model->select_region()->result();
			$data['listItem'] 	= $this->checkout_model->select_all_item()->result();
			$this->template_front->display('checkout_v', $data);
		} else {
			// Jika Belum, Tampil Halaman Login/Register
			redirect(site_url('login'));
		}
	}
}
/* Location: ./application/controller/Checkout.php */
?>