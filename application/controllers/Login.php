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

	public function validasi() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = 'false';
			$this->template_front->display('login_v', $data);
		} else {
			$username 	= trim($this->input->post('email', 'true'));
			$password 	= trim($this->input->post('password', 'true'));
			
			$temp_user 	= $this->login_model->get_user($username)->row();
			$num_user 	= count($temp_user);

			if ($num_user == 0) {
				$this->session->set_flashdata('notificationerror','<b>Sorry !! Your E-Mail not registered.</b>');
				redirect(site_url('login'));
			} elseif ($num_user > 0) {
				$temp_account 	= $this->login_model->check_user_account($username, sha1($password))->row();
				$num_account 	= count($temp_account);

				if ($num_account > 0) {
					$array_item = array('username' 					=> $temp_account->user_username,
										'nama' 						=> $temp_account->user_name,
										'level' 					=> $temp_account->user_level,
										'logged_in_member' 			=> TRUE
										);

					$this->session->set_userdata($array_item);
					redirect(site_url('myaccount'));
				} else {
					$this->session->set_flashdata('notificationerror','<b>Wrong Username or Password, maybe Your Account is Non Active.</b>');
					redirect(site_url('login'));
				}
			}
		}
	}
}
/* Location: ./application/controller/Login.php */
?>