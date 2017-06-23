<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printinvoice extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
        $this->load->library('template');
        $this->load->model('admin/print_model');
    }

    public function index() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function id($invoice_id) {
        $data['bank']       = $this->print_model->select_detail_bank()->row();
        $data['detail']     = $this->print_model->select_detail($invoice_id)->row();
        $data['contact']    = $this->print_model->select_contact()->row();
        $data['listItem']   = $this->print_model->select_all_item($invoice_id)->result();
        
        $this->load->view('admin/invoice_template_view', $data);
    }
}
/* Location: ./application/controller/admin/Printinvoice.php */