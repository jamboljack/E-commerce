<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('chart_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['listItem'] 	= $this->chart_model->select_all_item()->result();
			$this->template_front->display('chart_v', $data);
		} else {
			// Jika Belum, Tampil Halaman Login/Register
			redirect(site_url('login'));
		}
	}

	public function addtochart($product_id) {
		if($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka Tambahkan Item Produk
			$data['listItem'] 	= $this->chart_model->select_all_item()->result();
			$this->template_front->display('chart_v', $data);
		} else {
			redirect(site_url('login'));
		}
	}		
}
/* Location: ./application/controller/Contact.php */
?>