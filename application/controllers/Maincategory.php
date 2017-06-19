<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('maincategory_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		redirect(base_url());
	}

	public function item($maincategory_id) {
		$maincategory_id 		= $this->uri->segment(3);
		$data['detail'] 		= $this->maincategory_model->select_detail($maincategory_id)->row();
		$data['listSubCategory']= $this->maincategory_model->select_sub_category($maincategory_id)->result();
		$this->template_front->display('maincategory_v', $data);
	}
}
/* Location: ./application/controller/Maincategory.php */
?>