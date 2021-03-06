<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/orders_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 		= $this->orders_model->select_all()->result();
			$this->template->display('admin/order_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function detaildata($order_id) {
		$data['detail'] 	= $this->orders_model->select_detail($order_id)->row();
		$data['listItem'] 	= $this->orders_model->select_all_item($order_id)->result();
		$this->template->display('admin/order_detail_view', $data);
	}

	public function updatedata() {
		$this->orders_model->update_data();
		$this->session->set_flashdata('notification','Update Data Order Success.');
 		redirect(site_url('admin/orders'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/orders'));
		} else {
			$this->orders_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/orders'));
		}
	}
}
/* Location: ./application/controller/admin/Orders.php */