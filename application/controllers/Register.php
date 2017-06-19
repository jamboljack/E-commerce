<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('register_model');
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

	public function sendemail() {
		
		$email 			= trim($this->input->post('email', 'true'));
		$kode_aktivasi = md5(uniqid(rand()));
		$data = array( 'user_email' => trim($this->input->post('email', 'true')),
	    				'user_level' => 'Member',
	    				'user_date_update' => date('Y-m-d'),
	    				'user_time_update' => date('Y-m-d H:i:s')
		);

		$sender_email 	= 'no-reply@kcfurnindo.com';
		$sender_name 	= 'no-reply@kcfurnindo.com';
		$subject 		= 'User Activation';
		$message 		= "<h2><b>Thank You for Signing up to KcFurnindo Jepara</b></h2>";

		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from($sender_email, $sender_name);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();

		$this->session->set_flashdata('notificationregister','E-Mail Send Activation.');
 		redirect(site_url('register'));
	}
}
/* Location: ./application/controller/Register.php */
?>