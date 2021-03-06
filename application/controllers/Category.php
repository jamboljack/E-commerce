<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('category_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function item($category_id) {
		$category_id 			= $this->uri->segment(3);
		$data['detail'] 		= $this->category_model->select_detail($category_id)->row();
		$data['listProduct'] 	= $this->category_model->select_all_product($category_id)->result();
		$this->template_front->display('category_v', $data);
	}

	public function collection($category_id) {
		$category_id 			= $this->uri->segment(3);
		$data['detail'] 		= $this->category_model->select_detail($category_id)->row();
		$data['listProduct'] 	= $this->category_model->select_all_collection($category_id)->result();
		$this->template_front->display('category_v', $data);
	}
}
/* Location: ./application/controller/Category.php */
?>