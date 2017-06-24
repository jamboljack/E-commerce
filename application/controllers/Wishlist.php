<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->library('template_front');
		$this->load->model('wishlist_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['listItem'] 	= $this->wishlist_model->select_all()->result();
			$this->template_front->display('wishlist_v', $data);
		} else {			
			redirect(site_url('login'));
		}
	}

	public function addtowishlist() {
		if($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka Tambahkan Item Produk
			$product_id = $this->input->post('product_id', 'true'); // Product ID
			$checkData 	= $this->wishlist_model->check_product($product_id)->row();
			
			if (count($checkData) == 0) {
				$this->wishlist_model->insert_data($product_id);
			}

			$this->session->set_flashdata('notification','Success, Product Added to wishlist.');
			redirect(site_url('wishlist'));
		} else {
			redirect(site_url('login'));
		}
	}

	public function deleteitem($wishlist_id) {
		$wishlist_id = $this->security->xss_clean($this->uri->segment(3));

		if ($wishlist_id == null) {
			redirect(site_url('wishlist'));
		} else {
			$this->wishlist_model->delete_data($wishlist_id);
			$this->session->set_flashdata('notification','Success, Product Wishlist Deleted.');
			redirect(site_url('wishlist'));
		}
	}
}
/* Location: ./application/controller/Wishlist.php */
?>