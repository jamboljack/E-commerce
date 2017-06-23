<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
        $this->load->library('template');
        $this->load->model('admin/profile_model');
    }

    public function index() {
        if($this->session->userdata('logged_in_furnindo')) {
            $data['detail']     = $this->profile_model->select_detail()->row();
            $data['listRegion'] = $this->profile_model->select_region()->result();
            $this->template->display('admin/profile_view', $data);
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
}
/* Location: ./application/controller/admin/Profile.php */