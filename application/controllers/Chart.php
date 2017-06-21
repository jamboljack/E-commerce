<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('chart_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['listItem'] 	= $this->chart_model->select_all_item()->result();
			$this->template_front->display('chart_v', $data);
		} else {
			// Jika Belum, Tampil Halaman Login/Register
			redirect(site_url('login'));
		}
	}

	public function addtochart() {
		if($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka Tambahkan Item Produk
			$product_id = $this->input->post('product_id', 'true'); // Product ID
			$Qty   		= $this->input->post('qty', 'true'); // Qty

			$checkData = $this->chart_model->check_product($product_id)->row();
			if (count($checkData)) { // Jika Ada, Tambahkan Qty saja
				$temp_id 	= $checkData->temp_id;
				$oldQTy 	= $checkData->temp_qty;
				$newQty 	= ($oldQTy+$Qty);
				$this->chart_model->update_qty_temp($temp_id, $newQty);
			} else {
				$this->chart_model->insert_order_temp($product_id, $Qty);
			}

			$data['listItem'] 	= $this->chart_model->select_all_item()->result();
			$this->session->set_flashdata('notificationchart','Success, Product Added to Chart.');
			$this->template_front->display('chart_v', $data);
		} else {
			redirect(site_url('login'));
		}
	}

	public function updateitem() {
		if($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka Tambahkan Item Produk
			$temp_id 	= $this->input->post('temp_id', 'true'); // Product ID
			$Qty   		= $this->input->post('qty', 'true'); // Qty
			// Update Item
			$this->chart_model->update_order_temp($temp_id, $Qty);
			// List
			$data['listItem'] 	= $this->chart_model->select_all_item()->result();
			$this->session->set_flashdata('notificationchart','Success, Product Quantity Update.');
			$this->template_front->display('chart_v', $data);
		} else {
			redirect(site_url('login'));
		}
	}

	public function deleteitem($temp_id) {
		$temp_id = $this->security->xss_clean($this->uri->segment(3));

		if ($temp_id == null) {
			redirect(site_url('chart'));
		} else {
			$this->chart_model->delete_data_item($temp_id);
			$this->session->set_flashdata('notificationchart','Success, Product Deleted.');
			redirect(site_url('chart'));
		}
	}
}
/* Location: ./application/controller/Contact.php */
?>