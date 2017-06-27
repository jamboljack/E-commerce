<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('template_front');
		$this->load->model('search_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function keyword() {
		$keyword 				= trim($this->input->post('search', 'true'));
		$data['keyword']		= trim($this->input->post('search', 'true'));
		$data['listProduct'] 	= $this->search_model->select_all_product($keyword)->result();
		$this->template_front->display('search_v', $data);
	}
}
/* Location: ./application/controller/Search.php */
?>