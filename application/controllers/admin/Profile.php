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
            $data['error']      = 'false';
            $data['detail']     = $this->profile_model->select_detail()->row();
            $data['listRegion'] = $this->profile_model->select_region()->result();
            $this->template->display('admin/profile_view', $data);
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }

    public function updatedata() {
        $this->profile_model->update_data();
        $this->session->set_flashdata('notification','Update Data Success.');
        redirect(site_url('admin/profile'));
    }

    public function updatepassword() {
        $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]');

        if ($this->form_validation->run() == FALSE) {
            $data['error']      = 'true';
            $data['detail']     = $this->profile_model->select_detail()->row();
            $data['listRegion'] = $this->profile_model->select_region()->result();
            $this->template->display('admin/profile_view', $data);
        } else {
            $this->profile_model->update_password();
            $this->session->set_flashdata('notification','Update Password Success.');
            redirect(site_url('admin/profile'));
        }
    }
}
/* Location: ./application/controller/admin/Profile.php */