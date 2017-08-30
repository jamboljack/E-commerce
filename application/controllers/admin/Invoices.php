<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in_furnindo')) redirect(base_url());
		$this->load->library('template');
		$this->load->helper('path');
		$this->load->model('admin/invoices_model');
		$this->load->model('admin/print_model');
	}
	
	public function index() {
		if($this->session->userdata('logged_in_furnindo')) {
			$data['listData'] 		= $this->invoices_model->select_all()->result();
			$this->template->display('admin/invoice_view', $data);
		} else {
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}

	public function adddata() {
		$data['listData'] = $this->invoices_model->select_order()->result();
		$this->template->display('admin/invoice_add_view', $data); 
	}

	public function detaildatainvoice($order_id) {
		$data['detail'] 	= $this->invoices_model->select_detail($order_id)->row();
		$data['listItem'] 	= $this->invoices_model->select_all_item($order_id)->result();
		$this->template->display('admin/order_invoice_detail_view', $data);
	}	

	public function create() {
		//$this->invoices_model->insert_data();
		
		$username 		= $this->session->userdata('username_admin'); // User Admin
		$tgl_invoice	= date('Y-m-d');
		
		// Cari Due Date
		$query 			= $this->db->query("SELECT * FROM furnindo_contact WHERE contact_id = 1");
		$row 			= $query->row();
		if (isset($row)) {
			$due_date 	= $row->contact_tempo; // Due Date
			$image 		= $row->contact_logo; // Logo
		} else {
			$due_date 	=  0; // Due Date
			$image 		= '';// Logo
		}

		$tgl_tempo 		= strtotime ('+'.$due_date.' day', strtotime ($tgl_invoice) ) ; // Menambah berapa hari dari Settingan Contact
		$tgl_tempo 		= date ('Y-m-d', $tgl_tempo); // Variabel untuk menyimpan ke Tabel

		$data = array(	'user_username'		=> $username,
						'order_id'			=> $this->input->post('order_id', 'true'),
						'invoice_date'		=> date('Y-m-d'),
						'invoice_tempo'		=> $tgl_tempo,
				   		'invoice_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->insert('furnindo_invoice', $data);
		$invoice_id = $this->db->insert_id(); // Invoice ID Baru

		// Update Status Order menjadi 1 (Sudah buat Invoice)
		$order_id 	= $this->input->post('order_id', 'true');
		$data = array(	'order_status_invoice'	=> 1,
				   		'order_update' 			=> date('Y-m-d H:i:s')
		);

		$this->db->where('order_id', $order_id);
		$this->db->update('furnindo_order', $data);

		// Creat Invoice PDF
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

        // Cari Data Invoice Baru
		$queryinv 		= $this->db->query("SELECT i.*, o.order_total, o.order_date FROM furnindo_invoice i JOIN furnindo_order o 
											ON i.order_id = o.order_id WHERE i.invoice_id = $invoice_id");
		$rowinv			= $queryinv->row();
		$total 			= $rowinv->order_total; // Total
		$tempo 			= date("d-m-Y", strtotime($rowinv->invoice_tempo)); // Tempo
		$tgl_order 		= date("d-m-Y", strtotime($rowinv->order_date)); // Tgl. Order

		// Cari Data Bank
		$querybank 		= $this->db->query("SELECT * FROM furnindo_bank WHERE bank_id = 1");
		$rowbank		= $querybank->row();

		// Send Invoice Email
		$email 			= trim($this->input->post('email', 'true')); // Email Member
		$sender_email 	= 'no-reply@kcfurnindo.com';
		$sender_name 	= 'no-reply';
		$subject 		= 'Customer Invoice #'.$invoice_id;
		$message 		= '<html><body>
							<p>
							Email ini adalah pemeberitahuan bahwa Invoice untuk pemesanan anda telah dibuat pada '.date('d-m-Y').'
							<br>
							<b>Invoice #'.$invoice_id.'</b><br>
							Jumlah Tagihan: Rp. '.number_format($total).'<br>
							Jatuh Tempo : '.$tempo.'
							<br><br>
							Untuk :<br>
							Order No. #'.$order_id.'<br>
							Tanggal Order : '.$tgl_order.'
							<br><br>
							Untuk Transfer Bank, Silahkan lakukan pembayaran melalui Bank berikut.<br>'
							.$rowbank->bank_name.'
							<br>Account Name : '.$rowbank->bank_owner.'
							<br>Account No.  : '.$rowbank->bank_no_account.'
							<br><br>'
							.$row->contact_name.'<br>'
							.$row->contact_address.'<br>'
							.$row->contact_city.' '.$row->contact_zipcode.'<br>'
							.$row->contact_region.'<br>
							PHONE :'.$row->contact_phone.'<br>
							WA :'.$row->contact_wa.'<br>
							</p></body></html>';

		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->from($sender_email, $sender_name);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		// Attachment
		//$path 	= $_SERVER["DOCUMENT_ROOT"]; //Path Local
    	//$file 	= $path."/download"."/".$filename.".pdf";
    	$file   = base_url('download/'.$filename.'.pdf'); // Link Domain.com/folderfile/namafile
		$this->email->attach($file);
		
		if ($this->email->send()) {
			$this->session->set_flashdata('notification','Send Invoice Successfull.');
		} else {
			$this->session->set_flashdata('notificationerror','Send Invoice Failed.');
		}

	 	redirect(site_url('admin/invoices'));
	}

	public function editdata($invoice_id) { // Edit Data Invoice
		$data['detail'] 	= $this->invoices_model->select_detail_invoice($invoice_id)->row();
		$data['listItem'] 	= $this->invoices_model->select_all_item_invoice($invoice_id)->result();
		$this->template->display('admin/invoice_edit_view', $data);
	}

	public function updatedata() {
		$this->invoices_model->update_data();
		$this->session->set_flashdata('notification','Update Data Invoice Success.');
 		redirect(site_url('admin/invoices'));
	}
}
/* Location: ./application/controller/admin/Invoices.php */