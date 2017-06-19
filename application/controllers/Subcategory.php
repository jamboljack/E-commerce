<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('subcategory_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function item($subcategory_id) {
		$subcategory_id 		= $this->uri->segment(3);
		$data['detail'] 		= $this->subcategory_model->select_detail($subcategory_id)->row();
		$data['listCategory'] 	= $this->subcategory_model->select_all_category($subcategory_id)->result();
		$this->template_front->display('subcategory_v', $data);
	}
}
/* Location: ./application/controller/Subcategory.php */
?>