<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('admin/invoices_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 		= $this->invoices_model->select_all()->result();
			$this->template->display('admin/invoice_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['listData'] = $this->invoices_model->select_order()->result();
		$this->template->display('admin/invoice_add_view', $data); 
	}

	public function detaildatainvoice($order_id) {
		$data['detail'] 	= $this->invoices_model->select_detail($order_id)->row();
		$data['listItem'] 	= $this->invoices_model->select_all_item($order_id)->result();
		$this->template->display('admin/order_invoice_detail_view', $data);
	}	

	public function create() {
		$this->invoices_model->insert_data();
		$this->session->set_flashdata('notification','Invoice Create Successfull.');
	 	redirect(site_url('admin/invoices'));
	}

	public function editdata($invoice_id) { // Edit Data Invoice
		$data['detail'] 	= $this->invoices_model->select_detail_invoice($invoice_id)->row();
		$data['listItem'] 	= $this->invoices_model->select_all_item_invoice($invoice_id)->result();
		$this->template->display('admin/invoice_edit_view', $data);
	}

	public function updatedata() {
		$this->invoices_model->update_data();
		$this->session->set_flashdata('notification','Update Data Invoice Success.');
 		redirect(site_url('admin/invoices'));
	}
}
/* Location: ./application/controller/admin/Invoices.php */