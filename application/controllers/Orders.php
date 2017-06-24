<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(base_url());	
		$this->load->library('template_front');
		$this->load->model('orders_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['listData'] 	= $this->orders_model->select_all()->result();
			$this->template_front->display('orders_v', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function detaildata($order_id) {
		$data['detail'] 	= $this->orders_model->select_detail($order_id)->row();
		$data['listItem'] 	= $this->orders_model->select_all_item($order_id)->result();
		$this->template_front->display('orders_detail_v', $data);
	}
}
/* Location: ./application/controller/Orders.php */
?>