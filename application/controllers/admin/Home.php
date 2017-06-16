<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
        $this->load->library('template');
    }

    public function index()
    {
        if($this->session->userdata('logged_in_furnindo')) {
            $this->template->display('admin/home_view');
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
}
/* Location: ./application/controller/admin/Home.php */