<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('contact_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		$data['detail'] 	= $this->contact_model->select_contact()->row();
		$this->template_front->display('contact_v', $data);
	}	
}
/* Location: ./application/controller/Contact.php */
?>