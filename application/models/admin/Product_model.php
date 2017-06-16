<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	var $tabel_category	= 'furnindo_category';

	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('p.*, m.category_name as main, c.category_name as category');
		$this->db->from('furnindo_product p');
		$this->db->join('furnindo_category m', 'p.main_category = m.category_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->order_by('p.product_id', 'asc');
		
		return $this->db->get();
	}

	function select_main() {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_level', 'Main');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}

	public function select_sub_category($category_id){
		$this->db->where('category_subid', $category_id);
		$this->db->order_by('category_no', 'asc');
		$sql_category = $this->db->get($this->tabel_category);
		if($sql_category->num_rows()>0) {
			foreach ($sql_category->result_array() as $row) {
            	$result['']= '- Choose Sub Category -';
            	$result[$row['category_id']]= trim($row['category_name']);
        	}
		} else {
		   	$result['']= '- No Sub Category -';
		}
        return $result;
	}

	public function select_category($category_id){
		$this->db->where('category_subid', $category_id);
		$this->db->order_by('category_no', 'asc');
		$sql_category = $this->db->get($this->tabel_category);
		if($sql_category->num_rows()>0) {
			foreach ($sql_category->result_array() as $row) {
            	$result['']= '- Choose Category -';
            	$result[$row['category_id']]= trim($row['category_name']);
        	}
		} else {
		   	$result['']= '- No Category -';
		}
        return $result;
	}

	function select_brand() {
		$this->db->select('*');
		$this->db->from('furnindo_brand');
		$this->db->order_by('brand_id', 'asc');
		
		return $this->db->get();
	}

	function select_SubCategory() {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_level', 'Level-1');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}

	function select_Kategori() {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_level', 'Level-2');
		$this->db->order_by('category_no', 'asc');
		
		return $this->db->get();
	}
		
	function insert_data() {
		if (!empty($_FILES['userfile']['name'])) {
			$data = array(	'main_category'		=> $this->input->post('lstMain', 'true'),
							'sub_category'		=> $this->input->post('lstSubCategory', 'true'),
							'category_id'		=> $this->input->post('lstCategory', 'true'),
							'brand_id'			=> $this->input->post('lstBrand', 'true'),
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
			$data = array(	'main_category'		=> $this->input->post('lstMain', 'true'),
							'sub_category'		=> $this->input->post('lstSubCategory', 'true'),
							'category_id'		=> $this->input->post('lstCategory', 'true'),
							'brand_id'			=> $this->input->post('lstBrand', 'true'),
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
			$data = array(	'main_category'		=> $this->input->post('lstMain', 'true'),
							'sub_category'		=> $this->input->post('lstSubCategory', 'true'),
							'category_id'		=> $this->input->post('lstCategory', 'true'),
							'brand_id'			=> $this->input->post('lstBrand', 'true'),
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
			$data = array(	'main_category'		=> $this->input->post('lstMain', 'true'),
							'sub_category'		=> $this->input->post('lstSubCategory', 'true'),
							'category_id'		=> $this->input->post('lstCategory', 'true'),
							'brand_id'			=> $this->input->post('lstBrand', 'true'),
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
}
/* Location: ./application/models/admin/Product_model.php */