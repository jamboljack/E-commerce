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
		$this->form_validation->set_rules('email','<b>Email</b>','trim|required|valid_email|is_unique[furnindo_users.user_username]');
		
		if ($this->form_validation->run() == FALSE) {
			$data['error'] = 'true';
			$this->template_front->display('login_v', $data);
		} else {
			$email 			= trim($this->input->post('email', 'true'));
			$kode_aktivasi 	= md5(uniqid(rand()));
			$data 	= array( 	'user_username' 		=> $email,
		    					'user_level' 			=> 'Member',
		    					'user_key_activation' 	=> $kode_aktivasi,
		    					'user_date_create' 		=> date('Y-m-d H:i:s'),
		    					'user_update' 			=> date('Y-m-d H:i:s')
			);

			$this->db->insert('furnindo_users', $data);

			// Send Email
			$sender_email 	= 'no-reply@hotelhomkudus.com';
			$sender_name 	= 'no-reply';
			$subject 		= 'Registration Success';
			$message 		= '<html><body>';
			$message 		.= '<table>';
			$message 		.= '<tr>
									<td align="center"><h2 style="color:#f40;">Thank You for Signing up to KcFurnindo Jepara</h2></td>
								</tr>';
			$message 		.= '<tr>
									<td align="center">
									<p align="center">
									You have requested to create an account with KcFurnindo Jepara using this email address :<br>'.
									$email.'
									<br>
									Before you can use your account, please verify your account by clicking on the following link :<br>
									<a href="http://www.kcfurnindo.com/register/create_account/'.$kode_aktivasi.'">Verify</a>
									<br><br>
									Or you can copy and paste the link below to your browser : <br>
									http://www.kcfurnindo.com/register/create_account/'.$kode_aktivasi.'
									<br><br>
									For more information, please go to <a href="http://www.kcfurnindo.com">kcfurnindo.com</a>
									</p>
									</td>
								</tr>';
			$message 		.= '</table>';
			$message 		.= '</body></html>';

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

	public function create_account($key) {
		$data['error'] 		= 'false';
		$key 				= $this->uri->segment(3);
		$data['listRegion'] = $this->register_model->select_region()->result();
		$data['detail'] 	= $this->register_model->select_detail($key)->row();
		$this->template_front->display('register_v', $data);
	}

	public function savedata() {
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passwordconfirm', 'Password Confirm', 'required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$data['error'] 		= 'true';
			$key 				= $this->uri->segment(3);
			$data['listRegion'] = $this->register_model->select_region()->result();
			$data['detail'] 	= $this->register_model->select_detail($key)->row();
			$this->template_front->display('register_v', $data);
		} else {
			$key 	= trim($this->uri->segment(3));

			$data = array(	'user_password'		=> sha1(trim($this->input->post('password', 'true'))),
							'user_name'			=> strtoupper(trim($this->input->post('name', 'true'))),
							'user_address'		=> strtoupper(trim($this->input->post('address', 'true'))),
							'region_id'			=> $this->input->post('lstRegion', 'true'),
							'user_city'			=> strtoupper(trim($this->input->post('city', 'true'))),
							'user_zipcode'		=> trim($this->input->post('zipcode', 'true')),
							'user_mobile'		=> trim($this->input->post('mobile', 'true')),
							'user_phone'		=> trim($this->input->post('phone', 'true')),
							'user_status'		=> 'Active',
				   			'user_update' 		=> date('Y-m-d H:i:s')
			);

			$this->db->where('user_key_activation', $key);
			$this->db->update('furnindo_users', $data);

			// Send Email
			$email          = $this->input->post('email', 'true');
			$sender_email 	= 'no-reply@hotelhomkudus.com';
			$sender_name 	= 'no-reply';
			$subject 		= 'Registration Success';
			$message 		= '<html><body>';
			$message 		.= '<table>';
			$message 		.= '<tr>
									<td align="center"><h2 style="color:#f40;">Thank You for Signing up to KcFurnindo Jepara</h2></td>
								</tr>';
			$message 		.= '<tr>
									<td align="center">
									<p align="center">
									Your account with KcFurnindo Jepara using this email address :<br>'.
									$email.'
									<br>has been successfully <b>verified</b>.
									<br><br>
									You can now login and start using your account.<br>
									<a href="http://www.kcfurnindo.com/login">Login to My Account</a>
									<br><br>
									For more information, please go to <a href="http://www.kcfurnindo.com">kcfurnindo.com</a>
									</p>
									</td>
								</tr>';
			$message 		.= '</table>';
			$message 		.= '</body></html>';

			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from($sender_email, $sender_name);
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();

	 		redirect(site_url('register/success'));
	 	}
	}

	public function success() {
		$this->template_front->display('register_success_v');
	}
}
/* Location: ./application/controller/Register.php */
?>