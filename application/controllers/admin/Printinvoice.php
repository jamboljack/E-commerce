<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printinvoice extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->model('admin/print_model');
    }

    public function index() {
        redirect(base_url());
    }

    public function id($invoice_id) {
        $data['bank']       = $this->print_model->select_detail_bank()->row();
        $data['detail']     = $this->print_model->select_detail($invoice_id)->row();
        $data['contact']    = $this->print_model->select_contact()->row();
        $data['listItem']   = $this->print_model->select_all_item($invoice_id)->result();
        
        $this->load->view('admin/invoice_template_view', $data);
    }

    public function pdf($invoice_id) {
        //$invoice_id = trim($this->uri->segment(4));
        
        $time = time();
        $filename = 'Invoice_'.$invoice_id.'_'.$time;
        $pdfFilePath = FCPATH."download/$filename.pdf";
            
        if (file_exists($pdfFilePath) == FALSE){
            ini_set('memory_limit','100M');            
            $data['bank']       = $this->print_model->select_detail_bank()->row();
            $data['detail']     = $this->print_model->select_detail($invoice_id)->row();
            $data['contact']    = $this->print_model->select_contact()->row();
            $data['listItem']   = $this->print_model->select_all_item($invoice_id)->result();
            $html = $this->load->view('admin/invoice_pdf', $data, true);            
            $this->load->library('pdf');
            $param = '"en-GB-x","A4-P","","",10,10,10,10,6,3'; // Landscape
            $pdf = $this->pdf->load($param);
            $pdf->SetHeader(''); 
            $pdf->SetFooter('');
            $pdf->WriteHTML($html); // write the HTML into the PDF
            $pdf->Output($pdfFilePath, 'F'); // save to file because we can
        }
        redirect("download/$filename.pdf");
    }
}
/* Location: ./application/controller/admin/Printinvoice.php */