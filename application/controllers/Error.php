<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller { 
	function __construct(){ 
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('menu_model');
	} 
		
	public function index() { 
		$this->output->set_status_header('404');		
		$this->template_front->display('404_v');
	} 
} 
/* Location: ./application/controllers/Error.php */
?>