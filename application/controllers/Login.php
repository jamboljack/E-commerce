<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('login_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan My Account
			redirect(site_url('myaccount'));
		} else {
			// Jika Belum, Tampil Halaman Login/Register
			$data['error'] = 'false';
			$this->template_front->display('login_v', $data);
		}
	}
}
/* Location: ./application/controller/Login.php */
?>