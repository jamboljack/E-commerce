<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function id($menu_id) {
		$data['detail'] 		= $this->menu_model->select_detail_menu($menu_id)->row();
		$this->template_front->display('menu_v', $data);
	}
}
/* Location: ./application/controller/Menu.php */
?>