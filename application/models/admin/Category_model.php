<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	var $tabel_subcategory	= 'furnindo_subcategory';

	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('c.*, s.subcategory_name, m.maincategory_name');
		$this->db->from('furnindo_category c');
		$this->db->join('furnindo_subcategory s', 'c.subcategory_id = s.subcategory_id');
		$this->db->join('furnindo_maincategory m', 'c.maincategory_id = m.maincategory_id');
		$this->db->order_by('c.category_no', 'asc');
		
		return $this->db->get();
	}
	
	function select_main_category() {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->order_by('maincategory_no', 'asc');
		
		return $this->db->get();
	}

	public function select_sub_category($maincategory_id){
		$this->db->where('maincategory_id', $maincategory_id);
		$this->db->order_by('subcategory_no', 'asc');
		$sql_subcategory = $this->db->get($this->tabel_subcategory);
		if($sql_subcategory->num_rows()>0) {
			foreach ($sql_subcategory->result_array() as $row) {
            	$result['']= '- Choose Sub Category -';
            	$result[$row['subcategory_id']]= trim($row['subcategory_name']);
        	}
		} else {
		   	$result['']= '- No Sub Category -';
		}
        return $result;
	}

	function insert_data() {
		$maincategory_id 	= $this->input->post('lstMainCategory', 'true');
		$subcategory_id 	= $this->input->post('lstSubCategory', 'true');
		$category_name		= ucwords(strtolower($this->input->post('name', 'true')));
		$category_name_seo	= seo_title($this->input->post('name', 'true'));
		$update 			= date('Y-m-d H:i:s');

		return $this->db->query("INSERT INTO furnindo_category 
		(maincategory_id, subcategory_id, category_no, category_name, category_name_seo, category_update)
		VALUES ('$maincategory_id', '$subcategory_id', (SELECT (c.category_no+1) FROM furnindo_category c ORDER BY c.category_no DESC LIMIT 1), '$category_name', '$category_name_seo', '$update')");
	}

	function select_detail($category_id) {
		$this->db->select('*');
		$this->db->from('furnindo_category');
		$this->db->where('category_id', $category_id);
		
		return $this->db->get();
	}

	function select_SubCategory() {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->order_by('subcategory_no', 'asc');
		
		return $this->db->get();
	}

	function update_data() {
		$category_id     	= $this->input->post('id');

		$data = array(	'maincategory_id'	=> $this->input->post('lstMainCategory', 'true'),
						'subcategory_id'	=> $this->input->post('lstSubCategory', 'true'),
						'category_name'		=> ucwords(strtolower($this->input->post('name', 'true'))),
						'category_name_seo'	=> seo_title($this->input->post('name', 'true')),
				   		'category_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('category_id', $category_id);
		$this->db->update('furnindo_category', $data);
	}

	function delete_data($kode) {
		$this->db->where('category_id', $kode);
		$this->db->delete('furnindo_category');
	}

	function up($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi' WHERE category_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi_baru' WHERE category_id = '$id'");
	}

	function down($id, $posisi, $posisi_baru){
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi' WHERE category_no = '$posisi_baru'");
		$this->db->query("UPDATE furnindo_category SET category_no = '$posisi_baru' WHERE category_id = '$id'");
	}
}
/* Location: ./application/models/admin/Category_model.php */