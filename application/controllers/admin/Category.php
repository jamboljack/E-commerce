<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/category_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 	= $this->category_model->select_all()->result();
			$this->template->display('admin/category_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['listMain'] 	= $this->category_model->select_main_category()->result();
		$this->template->display('admin/category_add_view', $data);
	}

	// dijalankan saat Main Category di klik
    public function pilih_subcategory() {
        $data['listSubCategory']     = $this->category_model->select_sub_category($this->uri->segment(4));
        $this->load->view('admin/drop_down_sub_category_view', $data);
    }

	public function savedata() {
		$this->category_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
	 	redirect(site_url('admin/category'));
	}

	public function editdata($category_id) {
		$data['listMain'] 			= $this->category_model->select_main_category()->result();
		$data['listSubCategory'] 	= $this->category_model->select_SubCategory()->result();
		$data['detail'] 			= $this->category_model->select_detail($category_id)->row();
		$this->template->display('admin/category_edit_view', $data);
	}

	public function updatedata() {
		$this->category_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/category'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/category'));
		} else {
			$this->category_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/category'));
		}
	}

	public function up() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi-1;
		$this->category_model->up($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}

	public function down() {
		$id 			= $this->uri->segment(4);
		$posisi 		= $this->uri->segment(5);
		$posisi_baru 	= $posisi+1;
		$this->category_model->down($id, $posisi, $posisi_baru);
		redirect(site_url('admin/category'));
	}
}
/* Location: ./application/controller/admin/Category.php */