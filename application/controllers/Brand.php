<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('brand_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function id($brand_id) {
		$data['detail'] 		= $this->brand_model->select_detail($brand_id)->row();
		$data['listProduct'] 	= $this->brand_model->select_all_product($brand_id)->result();
		$this->template_front->display('brand_v', $data);
	}
}
/* Location: ./application/controller/Brand.php */
?>