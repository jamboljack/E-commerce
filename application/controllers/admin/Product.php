<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());		
		$this->load->library('template');
		$this->load->model('admin/product_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {	
			$data['listData'] 		= $this->product_model->select_all()->result();
			$this->template->display('admin/product_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['listMain'] 	= $this->product_model->select_main()->result();
		$data['listBrand'] 	= $this->product_model->select_brand()->result();
		$this->template->display('admin/product_add_view', $data);
	}

	// dijalankan saat Main Category di klik
    public function pilih_subcategory() {
        $data['listSubCategory']     = $this->product_model->select_sub_category($this->uri->segment(4));
        $this->load->view('admin/drop_down_sub_category_view', $data);
    }

    // dijalankan saat Sub Category di klik
    public function pilih_category() {
        $data['listCategory']     = $this->product_model->select_category($this->uri->segment(4));
        $this->load->view('admin/drop_down_category_view', $data);
    }

	public function savedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			$config['file_name']    	= 'Product_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/product/';
			$config['allowed_types'] 	= 'jpg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 500; // 100 Px
			$config['height'] 			= 500; // 100 px
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->product_model->insert_data();
		$this->session->set_flashdata('notification','Save Data Success.');
 		redirect(site_url('admin/product'));
	}

	public function editdata($product_id) {
		$data['listMain'] 			= $this->product_model->select_main()->result();
		$data['listBrand'] 			= $this->product_model->select_brand()->result();
		$data['listSubCategory'] 	= $this->product_model->select_SubCategory()->result();
		$data['listCategory'] 		= $this->product_model->select_Kategori()->result();
		$data['detail'] 			= $this->product_model->select_detail($product_id)->row();
		$this->template->display('admin/product_edit_view', $data);
	}

	public function updatedata() {
		if (!empty($_FILES['userfile']['name'])) {
			$jam 	= time();
			$name 	= seo_title(trim($this->input->post('name', 'true')));
			$config['file_name']    	= 'Product_'.$name.'_'.$jam.'.jpg';
			$config['upload_path'] 		= './img/product/';
			$config['allowed_types'] 	= 'jpg|png|gif|png';		
			$config['overwrite'] 		= TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $this->upload->upload_path.$this->upload->file_name;
			$config['maintain_ratio'] 	= TRUE;
			$config['width'] 			= 500; // 100 Px
			$config['height'] 			= 500; // 100 px
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();
		} elseif (empty($_FILES['userfile']['name'])){
			$config['file_name'] = '';
		}

		$this->product_model->update_data();
		$this->session->set_flashdata('notification','Update Data Success.');
 		redirect(site_url('admin/product'));
	}

	public function deletedata($kode) {
		$kode = $this->security->xss_clean($this->uri->segment(4));

		if ($kode == null) {
			redirect(site_url('admin/product'));
		} else {
			$this->product_model->delete_data($kode);
			$this->session->set_flashdata('notification','Delete Data Success.');
			redirect(site_url('admin/product'));
		}
	}
}
/* Location: ./application/controller/admin/Product.php */