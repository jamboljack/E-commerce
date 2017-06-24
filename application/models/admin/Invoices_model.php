<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}
		
	function select_all() {
		$this->db->select('i.*, o.*, u.*');
		$this->db->from('furnindo_invoice i');
		$this->db->join('furnindo_order o', 'i.order_id = o.order_id');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->order_by('i.invoice_id', 'desc');
		
		return $this->db->get();
	}

	function select_order() {
		$this->db->select('o.*, u.*');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->where('o.order_status_invoice', 0);
		$this->db->where('o.order_status <>', 'Open');
		$this->db->order_by('o.order_id', 'desc');
		
		return $this->db->get();
	}

	function select_detail($order_id) {
		$this->db->select('o.*, u.*, s.*, r.region_name, n.region_name as negara');
		$this->db->from('furnindo_order o');
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username');
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region User
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('o.order_id', $order_id);
		
		return $this->db->get();
	}

	function select_all_item($order_id) {
		$this->db->select('d.*, p.product_name, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->where('d.order_id', $order_id);
		
		return $this->db->get();
	}

	function insert_data() {
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
		$sender_email 	= 'no-reply@hotelhomkudus.com';
		$sender_name 	= 'no-reply';
		$subject 		= 'Customer Invoice #'.$invoice_id;
		$message 		= '<p>
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
							</p>';

		$this->load->library('email');
		$this->load->helper('path');
		$this->email->set_mailtype("html");
		$this->email->from($sender_email, $sender_name);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		// Attachment
		$path = $_SERVER["DOCUMENT_ROOT"];
    	$file = $path."/kcfurnindo/download/".$filename.".pdf";
		$this->email->attach($file);
		$this->email->send();
	}

	function select_detail_invoice($invoice_id) {
		$this->db->select('i.*, o.*, u.*, s.*, r.region_name, n.region_name as negara');
		$this->db->from('furnindo_invoice i');
		$this->db->join('furnindo_order o', 'i.order_id = o.order_id'); // Order
		$this->db->join('furnindo_users u', 'o.user_username = u.user_username'); // Pemesan
		$this->db->join('furnindo_shipping s', 's.order_id = o.order_id');
		$this->db->join('furnindo_region r', 'u.region_id = r.region_id'); // Region User
		$this->db->join('furnindo_region n', 's.region_id = n.region_id'); // Region Shipping
		$this->db->where('i.invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function select_all_item_invoice($invoice_id) {
		$this->db->select('d.*, p.product_name, c.category_name');
		$this->db->from('furnindo_order_detail d');
		$this->db->join('furnindo_product p', 'd.product_id = p.product_id');
		$this->db->join('furnindo_category c', 'p.category_id = c.category_id');
		$this->db->join('furnindo_order o', 'd.order_id = o.order_id');
		$this->db->join('furnindo_invoice i', 'i.order_id = o.order_id');
		$this->db->where('i.invoice_id', $invoice_id);
		
		return $this->db->get();
	}

	function update_data() {
		$invoice_id 	= $this->input->post('id', 'true');

		$data = array(	'invoice_status'	=> $this->input->post('lstStatus', 'true'),
				   		'invoice_update' 	=> date('Y-m-d H:i:s')
		);

		$this->db->where('invoice_id', $invoice_id);
		$this->db->update('furnindo_invoice', $data);
	}
}
/* Location: ./application/models/admin/Invoices_model.php */