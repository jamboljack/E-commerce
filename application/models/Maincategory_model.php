<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincategory_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_detail($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_maincategory');
		$this->db->where('maincategory_id', $maincategory_id);
		
		return $this->db->get();
	}

	function select_sub_category($maincategory_id) {
		$this->db->select('*');
		$this->db->from('furnindo_subcategory');
		$this->db->where('maincategory_id', $maincategory_id);
		$this->db->order_by('subcategory_no', 'asc');

		return $this->db->get();
	}


}
/* Location: ./application/models/admin/Maincategory_model.php */