<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('administrator_model');
	}

	public function index() {
		$session = $this->session->userdata('logged_in_furnindo');
		if ($session == FALSE) {
			$this->load->view('administrator_view');
		} else {
			redirect(site_url('admin/home'));
		}
	}

	public function validasi() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('administrator_view');
		} else {
			$username 	= trim($this->input->post('username', 'true'));
			$password 	= trim($this->input->post('password', 'true'));
			$temp_user 	= $this->administrator_model->get_user($username)->row();
			$num_user 	= count($temp_user);
			if ($num_user == 0) {
				$this->session->set_flashdata('notification','<b>Maaf !! Username Anda Tidak Terdaftar.</b>');
				redirect(site_url('administrator'));
			} elseif ($num_user > 0) {
				$temp_account = $this->administrator_model->check_user_account($username, sha1($password))->row();
				$num_account = count($temp_account);

				if ($num_account > 0) {
					$array_item = array(
									'username_admin' 		=> $temp_account->user_username,
									'nama_admin' 			=> $temp_account->user_name,
									'level_admin' 			=> $temp_account->user_level,
									'logged_in_furnindo' 	=> TRUE
					);
					
					$this->session->set_userdata($array_item);
					redirect(site_url('admin/home'));
				} else {
					$this->session->set_flashdata('notification','<b>Username atau Password Salah, atau Status Tidak Aktif.</b>');
					redirect(site_url('administrator'));
				}
			}
		}
	}

	public function logout() {
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-chace');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
/* Location: ./application/controller/Administrator.php */