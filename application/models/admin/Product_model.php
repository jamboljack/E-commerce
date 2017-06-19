<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	var $tabel_category	= 'furnindo_category';

	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('p.*, c.category_name, s.subcategory_name, m.maincategory_name, l.category_name as collection');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->join('furnindo_category l', 'p.collection_id = l.category_id', 'left');
		$this->db->order_by('p.product_id', 'asc');
		
		return $this->db->get();
	}

	function select_subcategory() {
		$this->db->select('s.*, m.maincategory_name');
		$this->db->from('furnindo_subcategory s');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->where('m.maincategory_collect', 0);
		$this->db->order_by('s.subcategory_no', 'asc');
		
		return $this->db->get();
	}

	function select_collection() {
		$this->db->select('c.*, s.subcategory_name');
		$this->db->from('furnindo_category c');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->join('furnindo_maincategory m', 's.maincategory_id = m.maincategory_id');
		$this->db->where('m.maincategory_collect', 1);
		$this->db->order_by('c.category_no', 'asc');
		
		return $this->db->get();
	}

	function select_category($subcategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('subcategory_id', $subcategory_id);
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'category_id'		=> $this->input->post('lstCategory', 'true'),
							'collection_id'		=> $this->input->post('lstCollection', 'true'),
							'product_name'		=> strtoupper(trim($this->input->post('name', 'true'))),
							'product_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'product_desc'		=> $this->input->post('desc', 'true'),
							'product_image' 	=> $this->upload->file_name,
							'product_new'		=> $this->input->post('chkNew', 'true'),
							'product_best'		=> $this->input->post('chkBest', 'true'),
							'product_special'	=> $this->input->post('chkSpecial', 'true'),
				   			'product_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'category_id'		=> $this->input->post('lstCategory', 'true'),
							'collection_id'		=> $this->input->post('lstCollection', 'true'),
							'product_name'		=> strtoupper(trim($this->input->post('name', 'true'))),
							'product_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'product_desc'		=> $this->input->post('desc', 'true'),
							'product_new'		=> $this->input->post('chkNew', 'true'),
							'product_best'		=> $this->input->post('chkBest', 'true'),
							'product_special'	=> $this->input->post('chkSpecial', 'true'),
				   			'product_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->insert('furnindo_product', $data);
	}

	function select_detail($product_id) {
		$this->db->select('*');
		$this->db->from('furnindo_product');
		$this->db->where('product_id', $product_id);
		
		return $this->db->get();
	}

	function update_data() {
		$product_id     	= $this->input->post('id');

		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'category_id'		=> $this->input->post('lstCategory', 'true'),
							'collection_id'		=> $this->input->post('lstCollection', 'true'),
							'product_name'		=> strtoupper(trim($this->input->post('name', 'true'))),
							'product_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'product_desc'		=> $this->input->post('desc', 'true'),
							'product_image' 	=> $this->upload->file_name,
							'product_new'		=> $this->input->post('chkNew', 'true'),
							'product_best'		=> $this->input->post('chkBest', 'true'),
							'product_special'	=> $this->input->post('chkSpecial', 'true'),
				   			'product_update' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(	'category_id'		=> $this->input->post('lstCategory', 'true'),
							'collection_id'		=> $this->input->post('lstCollection', 'true'),
							'product_name'		=> strtoupper(trim($this->input->post('name', 'true'))),
							'product_name_seo'	=> seo_title(trim($this->input->post('name', 'true'))),
							'product_desc'		=> $this->input->post('desc', 'true'),
							'product_new'		=> $this->input->post('chkNew', 'true'),
							'product_best'		=> $this->input->post('chkBest', 'true'),
							'product_special'	=> $this->input->post('chkSpecial', 'true'),
				   			'product_update' 	=> date('Y-m-d H:i:s')
			);
		}

		$this->db->where('product_id', $product_id);
		$this->db->update('furnindo_product', $data);
	}

	function delete_data($kode) {
		$this->db->where('product_id', $kode);
		$this->db->delete('furnindo_product');
	}

	function select_all_image($product_id) {
		$this->db->select('*');
		$this->db->from('furnindo_product_image');
		$this->db->where('product_id', $product_id);
		
		return $this->db->get();
	}

	function insert_data_image() {
		$data = array(	'product_id'	=> $this->uri->segment(4),
						'image_file' 	=> $this->upload->file_name,
				   		'image_update' 	=> date('Y-m-d H:i:s')
			);

		$this->db->insert('furnindo_product_image', $data);
	}

	function delete_data_image($kode) {
		$this->db->where('image_id', $kode);
		$this->db->delete('furnindo_product_image');
	}
}
/* Location: ./application/models/admin/Product_model.php */