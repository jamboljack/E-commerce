<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(site_url('login'));
		$this->load->library('template_front');
		$this->load->model('invoices_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['listData'] 	= $this->invoices_model->select_all()->result();
			$this->template_front->display('invoices_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(site_url('login'));
		}
	}
}
/* Location: ./application/controller/Invoices.php */
?>