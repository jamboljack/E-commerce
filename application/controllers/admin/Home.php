<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
        $this->load->library('template');
        $this->load->model('admin/home_model');
    }

    public function index() {
        if($this->session->userdata('logged_in_furnindo')) {
            $data['listOpen']       = $this->home_model->select_open()->result();
            $data['Qty1']           = $this->home_model->select_qty_open()->row();
            $data['listProcess']    = $this->home_model->select_process()->result();
            $data['Qty2']           = $this->home_model->select_qty_process()->row();
            $data['listShipping']   = $this->home_model->select_shipping()->result();
            $data['Qty3']           = $this->home_model->select_qty_shipping()->row();
            $data['listClosed']     = $this->home_model->select_closed()->result();
            $data['Qty4']           = $this->home_model->select_qty_closed()->row();
            $data['listOrders']     = $this->home_model->select_orders()->result(); // Last Orders
            $this->template->display('admin/home_view', $data);
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
}
/* Location: ./application/controller/admin/Home.php */