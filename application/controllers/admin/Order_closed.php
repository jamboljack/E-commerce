<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_closed extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/order_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 		= $this->order_model->select_all_closed()->result();
			$this->template->display('admin/order_closed_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function detaildata($order_id) {
		$data['listRegion'] = $this->order_model->select_region()->result();
		$data['detail'] 	= $this->order_model->select_detail($order_id)->row();
		$data['listItem'] 	= $this->order_model->select_all_item($order_id)->result();
		$this->template->display('admin/order_detail_view', $data);
	}

	public function updatedata() {
		$this->order_model->update_data();
		$this->session->set_flashdata('notification','Update Data Order Success.');
 		redirect(site_url('admin/order_closed'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/order_closed'));
		} else {
			$this->order_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/order_closed'));
		}
	}
}
/* Location: ./application/controller/admin/Order_closed.php */