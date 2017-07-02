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

	public function forgotpassword() {
        $this->form_validation->set_rules('email','<b>Email</b>','trim|required|valid_email'); // Email harus Valid
        
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = 'true';
            $this->template_front->display('login_v', $data);
        } else {
            // Check Email Member
            $email      = trim($this->input->post('email'));
            $CheckEmail = $this->login_model->select_email($email)->row();
            
            if (count($CheckEmail) > 0) {
                $kode_forgot = trim(md5(uniqid(rand())));

                $data = array( 	'user_key_forgot'   => $kode_forgot,
                				'user_update'  		=> date('Y-m-d H:i:s')
                );

                $this->db->where('user_username', $email);
                $this->db->update('furnindo_users', $data);

                $sender_email   = 'no-reply@kcfurnindo.com';
                $sender_name    = 'no-reply';
                $account        = trim($CheckEmail->user_username);
                $name           = ucwords(strtolower(trim($CheckEmail->user_name)));
                $subject        = "Forgot Password";
                $message 		= '<html><body>';
                $message        .= "Hello, ".$name."
                                <br>
                                <p>Your Email    : ".$account."<br><br>
                                To reset your password please follow the link below : <br>
                                http://www.kcfurnindo.com/resetpassword/key/".$kode_forgot."<br><br>
                                If you need help or have any questions, please visit <a href='https://kcfurnindo.com'>kcfurnindo.com</a>
                                <br><br>
                                Thanks !<br>
                                KcFurnindo Jepara
                                </p>";
                $message 		.= '</body></html>';

                $this->load->library('email');
                $this->email->set_mailtype("html");
                $this->email->from($sender_email, $sender_name);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();

                $this->session->set_flashdata('notificationforgot','<b>Link Reset Password Send to Your Email.</b>');
                redirect(site_url('login'));
            } else {
                $this->session->set_flashdata('notificationerror','<b>Your Email not Registered.</b>');
                redirect(site_url('login'));
            }
        }
    }
}
/* Location: ./application/controller/Login.php */
?>