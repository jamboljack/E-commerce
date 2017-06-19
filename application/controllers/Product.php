<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('product_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function item($product_id) {
		$product_id 			= $this->uri->segment(3);
		$data['detail'] 		= $this->product_model->select_detail($product_id)->row();
		$data['listImage'] 		= $this->product_model->select_all_image($product_id)->result();
		$this->template_front->display('product_v', $data);
	}
}
/* Location: ./application/controller/Product.php */
?>