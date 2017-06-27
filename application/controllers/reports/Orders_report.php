<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_report extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->model('reports/orders_report_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['cari']	= 'off';
			$this->template->display('reports/orders_report_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function search($status = '', $from = '', $to = '') {
		$status = $this->input->post('lstStatus', 'true');
		$dari   = $this->input->post('from', 'true');
		$ke   	= $this->input->post('to', 'true');
		$from 	= date("Y-m-d", strtotime($dari));
		$to 	= date("Y-m-d", strtotime($ke));

		if ($status == 'all') {
			$data = array( 'Status' => 'all', 'From' => $from, 'To' => $to);
		} else {
			$data = array( 'Status' => $status, 'From' => $from, 'To' => $to);
		}
		$data['Rpt'] 			= $data;
		$data['cari'] 			= 'on';
		$data['listData'] 		= $this->orders_report_model->select_all_orders($status, $from, $to)->result();
		$this->template->display('reports/orders_report_view', $data);
	}
}
/* Location: ./application/controller/admin/Orders_report.php */